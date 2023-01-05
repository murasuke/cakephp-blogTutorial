<?php
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
        $this->autoLayout = false;

        $coverages = glob(TMP.'/coverage/coverage-*.json');

        $finalCoverage = new SebastianBergmann\CodeCoverage\CodeCoverage();
        $finalCoverage->filter()->addDirectoryToWhitelist(ROOT.DS.APP_DIR);


        $count = count($coverages);
        foreach ($coverages as $index => $coverageFile)
        {
            // echo 'Processing coverage (' . (string)($index + 1) . "/$count) from $coverageFile". PHP_EOL;
            $codecoverageData = json_decode(file_get_contents($coverageFile), JSON_OBJECT_AS_ARRAY);
            $testName = str_ireplace(basename($coverageFile,".json"),"coverage-", "");
            $finalCoverage->append($codecoverageData, $testName);
        }

        // echo "Generating final report..." . PHP_EOL;
        $report = new \SebastianBergmann\CodeCoverage\Report\Html\Facade();
        $report->process($finalCoverage, WWW_ROOT.'report');
        // echo "Report generated succesfully". PHP_EOL;
        $this->redirect('/app/webroot/report/', 301);
	}
}
