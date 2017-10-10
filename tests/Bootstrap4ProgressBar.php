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

    /**
     * Set at 25%
     */
    public function test25Percent()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set at 50%
     */
    public function test50Percent()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(50);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set at 100%
     */
    public function test100Percent()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(100);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Display label
     */
    public function testLabel()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->label('progress');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">progress</div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set height
     */
    public function testHeight()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->height(5);
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar" role="progressbar" style="width: 25%; height: 5px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, primary
     */
    public function testBgStylePrimary()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('primary');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, secondary
     */
    public function testBgStyleSecondary()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('secondary');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-secondary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, success
     */
    public function testBgStyleSuccess()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('success');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, danger
     */
    public function testBgStyleDanger()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('danger');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, warning
     */
    public function testBgStyleWarning()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('warning');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, info
     */
    public function testBgStyleInfo()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('info');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, light
     */
    public function testBgStyleLight()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('light');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-light" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, dark
     */
    public function testBgStyleDark()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('dark');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-dark" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style, white
     */
    public function testBgStyleWhite()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->setBgStyle('white');
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar bg-white" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set the striped option
     */
    public function testStriped()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->striped();
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set the striped option and animated
     */
    public function testStripedAndAnimated()
    {
        $view_helper = new Bootstrap4ProgressBar();
        $view_helper->__invoke(25)
            ->striped()
            ->animate();
        $this->assertEquals(
            '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>',
            $view_helper->__toString()
        );
    }
}
