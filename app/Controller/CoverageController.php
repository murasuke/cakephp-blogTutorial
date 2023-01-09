<?php
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;

App::uses('AppController', 'Controller');
/**
 *  Coverage Controller
 *
 */
class  CoverageController extends AppController {
    /**
     * index method
     *
     * @return void
     */
	public function index() {
        error_reporting(0);
        $this->autoRender = false;

        $coverages = glob(TMP.'/coverage/coverage-*.json');

        $codeCoverage = new CodeCoverage();
        $codeCoverage->filter()->addDirectoryToWhitelist(ROOT.DS.APP_DIR);

        foreach ($coverages as $index => $coverageFile)
        {
            $codecoverageData = json_decode(file_get_contents($coverageFile), JSON_OBJECT_AS_ARRAY);
            $codeCoverage->append($codecoverageData, $index);
        }

        $report = new Facade();
        $report->process($codeCoverage, WWW_ROOT.'report');
        $this->redirect('/app/webroot/report/');
	}
}
