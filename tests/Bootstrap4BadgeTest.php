<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Badge;

final class Bootstrap4BadgeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge');
        $this->assertEquals('<span class="badge">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the pill option
     */
    public function testPill()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->pill();
        $this->assertEquals('<span class="badge badge-pill">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStylePrimary()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('primary');
        $this->assertEquals('<span class="badge badge-primary">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleSecondary()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('secondary');
        $this->assertEquals('<span class="badge badge-secondary">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleSuccess()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('success');
        $this->assertEquals('<span class="badge badge-success">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleDanger()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('danger');
        $this->assertEquals('<span class="badge badge-danger">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleWarning()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('warning');
        $this->assertEquals('<span class="badge badge-warning">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleWInfo()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('info');
        $this->assertEquals('<span class="badge badge-info">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleLight()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('light');
        $this->assertEquals('<span class="badge badge-light">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleDark()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('dark');
        $this->assertEquals('<span class="badge badge-dark">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the styling options
     */
    public function testStyleInvalidOption()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->setBgStyle('invalid');
        $this->assertEquals('<span class="badge">Badge</span>', $view_helper->__toString());
    }

    /**
     * Test the as link option
     */
    public function testAsLink()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')->asLink('#');
        $this->assertEquals('<a href="#" class="badge">Badge</a>', $view_helper->__toString());
    }
    
    /**
     * Combined test
     */
    public function testCombined()
    {
        $view_helper = new Bootstrap4Badge();
        $view_helper->__invoke('Badge')
            ->asLink('#')
            ->pill()
            ->setBgStyle('primary')
            ->setTextStyle('light');
        $this->assertEquals(
            '<a href="#" class="badge badge-primary text-light badge-pill">Badge</a>',
            $view_helper->__toString()
        );
    }
    
}
