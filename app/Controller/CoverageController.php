<?php

App::uses('AppController', 'Controller');
App::uses('CoverageDumper', 'Lib');
/**
 *  Coverage Controller
 *
 */
class  CoverageController extends AppController {
    public function beforeFilter() {
        $this->response->disableCache();
    }
    /**
     * index method
     *
     * @return void
     */
	public function index() {
        error_reporting(0);
        $this->autoRender = false;

        CoverageDumper::createReport();
        $this->redirect('/app/webroot/reports/');
	}

    /**
     * カバレッジデータの削除
     * (レポートは削除しない)
     */
    public function delete() {
        $this->autoRender = false;
        CoverageDumper::deleteCoverageData();
        echo 'delete coveage data';
    }
}
