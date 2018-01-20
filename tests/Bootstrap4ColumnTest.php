<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Column;

/**
 * Test the bootstrap 4 column view helper to ensure the generated HTML is correct
 */
final class Bootstrap4ColumnTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]');
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test valid xs column width
     */
    public function testValidXsColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xs(6);
        $this->assertEquals('<div class="col-6">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid xs column width, silent error, width not assigned
     */
    public function testNegativeXsColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xs(-1);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid xs column width, silent error, width not assigned
     */
    public function testInvalidXsColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xs(14);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test valid sm column width
     */
    public function testValidSmColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->sm(6);
        $this->assertEquals('<div class="col-sm-6">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid sm column width, silent error, width not assigned
     */
    public function testNegativeSmColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->sm(-1);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid sm column width, silent error, width not assigned
     */
    public function testInvalidSmColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->sm(14);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test valid md column width
     */
    public function testValidMdColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->md(6);
        $this->assertEquals('<div class="col-md-6">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid md column width, silent error, width not assigned
     */
    public function testNegativeMdColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->md(-1);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid md column width, silent error, width not assigned
     */
    public function testInvalidMdColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->md(14);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test valid lg column width
     */
    public function testValidLgColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->lg(6);
        $this->assertEquals('<div class="col-lg-6">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid lg column width, silent error, width not assigned
     */
    public function testNegativeLgColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->lg(-1);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid lg column width, silent error, width not assigned
     */
    public function testInvalidLgColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->lg(14);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test valid xl column width
     */
    public function testValidXlColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xl(6);
        $this->assertEquals('<div class="col-xl-6">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid xl column width, silent error, width not assigned
     */
    public function testNegativeXlColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xl(-1);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test invalid xl column width, silent error, width not assigned
     */
    public function testInvalidXlColumnWidth()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xl(14);
        $this->assertEquals('<div class="">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test responsive column
     */
    public function testResponsiveColumn()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->xl(4)->lg(6)->md(8)->sm(12)->xs(12);
        $this->assertEquals(
            '<div class="col-xl-4 col-lg-6 col-md-8 col-sm-12 col-12">[Content]</div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test background color of column, primary
     */
    public function testBackgroundPrimary()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('primary')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-primary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, secondary
     */
    public function testBackgroundSecondary()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('secondary')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-secondary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, success
     */
    public function testBackgroundSuccess()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('success')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-success">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, danger
     */
    public function testBackgroundDanger()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('danger')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-danger">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, warning
     */
    public function testBackgroundWarning()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('warning')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-warning">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, info
     */
    public function testBackgroundInfo()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('info')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-info">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, light
     */
    public function testBackgroundLight()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('light')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-light">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background color of column, dark
     */
    public function testBackgroundDark()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('dark')->md(6);
        $this->assertEquals('<div class="col-md-6 bg-dark">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, primary
     */
    public function testTextPrimary()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('primary')->md(6);
        $this->assertEquals('<div class="col-md-6 text-primary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, secondary
     */
    public function testTextSecondary()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('secondary')->md(6);
        $this->assertEquals('<div class="col-md-6 text-secondary">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, success
     */
    public function testTextSuccess()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('success')->md(6);
        $this->assertEquals('<div class="col-md-6 text-success">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, danger
     */
    public function testTextDanger()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('danger')->md(6);
        $this->assertEquals('<div class="col-md-6 text-danger">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, info
     */
    public function testTextInfo()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('info')->md(6);
        $this->assertEquals('<div class="col-md-6 text-info">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, light
     */
    public function testTextLight()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('light')->md(6);
        $this->assertEquals('<div class="col-md-6 text-light">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test text color of column, dark
     */
    public function testTextDark()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setTextStyle('dark')->md(6);
        $this->assertEquals('<div class="col-md-6 text-dark">[Content]</div>', $view_helper->__toString());
    }

    /**
     * Test background and text column of column
     */
    public function testBackgroundAndTextSet()
    {
        $view_helper = new Bootstrap4Column();
        $view_helper->__invoke('[Content]')->setBgStyle('dark')->setTextStyle('light')->md(6);
        $this->assertEquals(
            '<div class="col-md-6 bg-dark text-light">[Content]</div>',
            $view_helper->__toString()
        );
    }
}
