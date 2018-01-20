<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Row;

/**
 * Test the bootstrap 4 row view helper to ensure the generated HTML is correct
 */
final class Bootstrap4RowTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]');
        $this->assertEquals('<div class="row">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, primary
     */
    public function testBackgroundPrimary()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('primary');
        $this->assertEquals('<div class="row bg-primary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, secondary
     */
    public function testBackgroundSecondary()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('secondary');
        $this->assertEquals('<div class="row bg-secondary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, success
     */
    public function testBackgroundSuccess()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('success');
        $this->assertEquals('<div class="row bg-success">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, danger
     */
    public function testBackgroundDanger()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('danger');
        $this->assertEquals('<div class="row bg-danger">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, warning
     */
    public function testBackgroundWarning()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('warning');
        $this->assertEquals('<div class="row bg-warning">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, info
     */
    public function testBackgroundInfo()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('info');
        $this->assertEquals('<div class="row bg-info">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, light
     */
    public function testBackgroundLight()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('light');
        $this->assertEquals('<div class="row bg-light">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of row, dark
     */
    public function testBackgroundDark()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('dark');
        $this->assertEquals('<div class="row bg-dark">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, primary
     */
    public function testTextPrimary()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('primary');
        $this->assertEquals('<div class="row text-primary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, secondary
     */
    public function testTextSecondary()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('secondary');
        $this->assertEquals('<div class="row text-secondary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, success
     */
    public function testTextSuccess()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('success');
        $this->assertEquals('<div class="row text-success">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, danger
     */
    public function testTextDanger()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('danger');
        $this->assertEquals('<div class="row text-danger">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, info
     */
    public function testTextInfo()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('info');
        $this->assertEquals('<div class="row text-info">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, light
     */
    public function testTextLight()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('light');
        $this->assertEquals('<div class="row text-light">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of row, dark
     */
    public function testTextDark()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setTextStyle('dark');
        $this->assertEquals('<div class="row text-dark">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color and text color of row
     */
    public function testBackgroundAndTextSet()
    {
        $view_helper = new Bootstrap4Row();
        $view_helper->__invoke('[Content]')->setBgStyle('dark')->setTextStyle('light');
        $this->assertEquals('<div class="row bg-dark text-light">[Content]</div>', $view_helper->__toString());
    }
}
