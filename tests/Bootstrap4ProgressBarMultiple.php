<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4ProgressBar;
use DBlackborough\Zf3ViewHelpers\Bootstrap4ProgressBarMultiple;

final class Bootstrap4ProgressBarMultipleTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4ProgressBarMultiple();
        $view_helper->__invoke([10, 15, 20], ['primary', 'secondary', 'warning']);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-primary" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar bg-secondary" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set height
     */
    public function testHeight()
    {
        $view_helper = new Bootstrap4ProgressBarMultiple();
        $view_helper->__invoke([10, 15, 20], ['primary', 'secondary', 'warning'])
            ->setHeight(10);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-primary" role="progressbar" style="width: 10%; height:10px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar bg-secondary" role="progressbar" style="width: 15%; height:10px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar bg-warning" role="progressbar" style="width: 20%; height:10px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set the striped option
     */
    public function testStriped()
    {
        $view_helper = new Bootstrap4ProgressBarMultiple();
        $view_helper->__invoke([10, 15, 20], ['primary', 'secondary', 'warning'])
            ->striped();
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set the striped option and animated
     */
    public function testStripedAndAnimated()
    {
        $view_helper = new Bootstrap4ProgressBarMultiple();
        $view_helper->__invoke([10, 15, 20], ['primary', 'secondary', 'warning'])
            ->striped()
            ->animate();
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div><div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }
}
