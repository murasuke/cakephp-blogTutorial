<?php
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;

/**
 * CoverageDumper
 * 手動でテスト用、コードカバレッジ取得するクラス(SebastianBergmann\CodeCoverage 4.0.*)
 * 機能
 * * .htaccessの「auto_prepend_file」に指定して、各phpファイル実行時にカバレッジを取得する
 * * 収集したデータをマージしてから、レポートを生成する
 * 補足
 * * データ、レポート保存用に書き込み可能なディレクトリが必要(なければCakePHP2に適した値で作成)
 */
class CoverageDumper
{
    /**
     * カバレッジデータ保存用テンポラリディレクトリ (デフォルト：TMP)
     */
    private static $_tmp;

    /**
     * カバレッジ取得対象ディレクトリ (デフォルト：ROOT.DS.APP_DIR)
     */
    private static $_tgt;
    /**
     * レポート出力対象 (デフォルト：WWW_ROOT.'report')
     */
    private static $_dst;

    /**
     * ディレクトリ存在チェック、書き込みチェックエラーの場合、カバレッジ取得を行わない
     */
    private static $_enable = true;

    /**
     * start code coverage
     */
    function __construct()
    {
        xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);
    }

    /**
     * 環境変数から保存先を取得(なければcakephp2に適したデフォルト値)
     */
    private static function initProperty() {
        if (empty(self::$_tmp)) {
            self::$_tmp = getenv('COVERAGE_TMP_DIR')? getenv('COVERAGE_TMP_DIR'): TMP.'coverage';
            self::$_tgt = getenv('COVERAGE_TGT_DIR')? getenv('COVERAGE_TGT_DIR'): ROOT.DS.APP_DIR;
            self::$_dst = getenv('COVERAGE_DST_DIR')? getenv('COVERAGE_DST_DIR'): WWW_ROOT.'reports';

            // 存在チェック＋なければ作成(失敗したらカバレッジ取得しない)
            if (!file_exists(self::$_tmp) && !is_dir(self::$_tmp)) {
                if (!mkdir(self::$_tmp, 0755, true)) {
                    self::$_enable = false;
                }
            }
            if (!file_exists(self::$_dst) && !is_dir(self::$_dst)) {
                if (!mkdir(self::$_dst, 0755, true)) {
                    self::$_enable = false;
                }
            }
        }
    }

    /**
     * save code coverage
     */
    function __destruct()
    {
        self::initProperty();

        $coverageName = self::$_tmp.'/coverage-' . microtime(true);
        // 先にデータを取得してから停止する(メモリ上のデータを解放するため)
        $data = xdebug_get_code_coverage();
        xdebug_stop_code_coverage();
        if (self::$_enable) {
            $codecoverageData = json_encode($data);
            file_put_contents($coverageName . '.json', $codecoverageData);
        }
    }

    /**
     * create code coverage reports
     * * @param bool $limitedReport trueの場合、実行したファイル(カバレッジ>0%)のみ出力対象とする
     */
    public static function createReport($limitedReport=true) {
        self::initProperty();

        $coverages = glob(self::$_tmp.'/coverage-*.json');

        $codeCoverage = new CodeCoverage();
        if (!$limitedReport) {
            $codeCoverage->filter()->addDirectoryToWhitelist(self::$_tgt, ['.php', '.ctp']);
        }

        foreach ($coverages as $index => $coverageFile) {
            $codecoverageData = json_decode(file_get_contents($coverageFile), JSON_OBJECT_AS_ARRAY);
            if ($limitedReport) {
                foreach (array_keys($codecoverageData) as $fileName) {
                    if (strpos($fileName, self::$_tgt) !== false) {
                        $codeCoverage->filter()->addFileToWhitelist($fileName);
                    }
                }
            }

            $codeCoverage->append($codecoverageData, '');
        }

        $report = new Facade();
        $report->process($codeCoverage, self::$_dst);
    }

    /**
     * delete coverage data
     */
    public static function deleteCoverageData() {
        self::initProperty();
        $coverages = glob(self::$_tmp.'/coverage-*.json');
        foreach ($coverages as $val) {
            unlink($val); // delete file
        }
    }
}

$_coverageDumper = new CoverageDumper();

