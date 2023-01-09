<?php
/**
 * CoverageDumper
 * https://xdebug.org/docs/code_coverage#xdebug_get_code_coverage
 */
class CoverageDumper
{
    function __construct()
    {
        xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);
    }

    function __destruct()
    {
        $coverageName = TMP.'coverage/coverage-' . microtime(true);
        try {
            xdebug_stop_code_coverage(false);
            $codecoverageData = json_encode(xdebug_get_code_coverage());
            file_put_contents($coverageName . '.json', $codecoverageData);
        } catch (Exception $ex) {
            file_put_contents($coverageName . '.ex', $ex);
        }
    }
}

$_coverageDumper = new CoverageDumper();

