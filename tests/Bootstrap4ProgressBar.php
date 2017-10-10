<?php

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '../../src/Bootstrap4Jumbotron.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4ProgressBar;

final class Bootstrap4ProgressBarTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }
}
