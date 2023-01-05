<?php

xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);

class CoverageDumper
{
    private $testName;

    function __construct( $testName)
    {
        $this->testName = $testName;
    }

    function __destruct()
    {
        // $coverageName = '/var/www/html/blogTutorial/app/tmp/coverage/coverage-' . $this->testName . '-' . microtime(true);
        $coverageName = TMP.'/coverage/coverage-' . $this->testName . '-' . microtime(true);
        try {
            xdebug_stop_code_coverage(false);
            $codecoverageData = json_encode(xdebug_get_code_coverage());
            file_put_contents($coverageName . '.json', $codecoverageData);
        } catch (Exception $ex) {
            file_put_contents($coverageName . '.ex', $ex);
        }
    }
}

$testName = (isset($_COOKIE['test_name']) && !empty($_COOKIE['test_name'])) ? $_COOKIE['test_name'] : 'unknown_test_' . time();
$_coverageDumper = new CoverageDumper($testName);

// require_once dirname(__FILE__).'/../../vendors/phpunit/php-code-coverage/src/CodeCoverage.php';
// require_once dirname(__FILE__).'/../../vendors/phpunit/php-code-coverage/src/Filter.php';
// $filter = new \SebastianBergmann\CodeCoverage\Filter();
// $filter->addDirectoryToWhitelist($base.'/app');


// $coverage = new \SebastianBergmann\CodeCoverage\CodeCoverage(null, $filter);
// $coverage->start('phpcov');

// $GLOBALS['cakephp_codecoverage'] = $coverage;





// function afterFilter() {
//     $coverage = $GLOBALS['cakephp_codecoverage'];
//     $coverage->stop();

//     require_once dirname(__FILE__).'/../../vendors/phpunit/php-code-coverage/src/Report/Html/Facade.php';
//     $writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade;
//     $writer->process($coverage, getcwd().'/coverage');
// }


