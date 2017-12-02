<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Alert;

/**
 * Test the bootstrap 4 alert view helper to ensure the generated HTML is correct
 */
final class Bootstrap4AlertTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!');
        $this->assertEquals('<div class="alert" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to primary
     */
    public function testBackgroundPrimary()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('primary');
        $this->assertEquals('<div class="alert alert-primary" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to secondary
     */
    public function testBackgroundSecondary()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('secondary');
        $this->assertEquals('<div class="alert alert-secondary" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to success
     */
    public function testBackgroundSuccess()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('success');
        $this->assertEquals('<div class="alert alert-success" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to danger
     */
    public function testBackgroundDanger()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('danger');
        $this->assertEquals('<div class="alert alert-danger" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to warning
     */
    public function testBackgroundWarning()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('warning');
        $this->assertEquals('<div class="alert alert-warning" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to info
     */
    public function testBackgroundInfo()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('info');
        $this->assertEquals('<div class="alert alert-info" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to light
     */
    public function testBackgroundLight()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('light');
        $this->assertEquals('<div class="alert alert-light" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test background style set to dark
     */
    public function testBackgroundDark()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('dark');
        $this->assertEquals('<div class="alert alert-dark" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to primary
     */
    public function testTextPrimary()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('primary');
        $this->assertEquals('<div class="alert text-primary" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to secondary
     */
    public function testTextSecondary()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('secondary');
        $this->assertEquals('<div class="alert text-secondary" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to success
     */
    public function testTextSuccess()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('success');
        $this->assertEquals('<div class="alert text-success" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to danger
     */
    public function testTextDanger()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('danger');
        $this->assertEquals('<div class="alert text-danger" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to info
     */
    public function testTextInfo()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('info');
        $this->assertEquals('<div class="alert text-info" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to light
     */
    public function testTextLight()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('light');
        $this->assertEquals('<div class="alert text-light" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test text style set to dark
     */
    public function testTextDark()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setTextStyle('dark');
        $this->assertEquals('<div class="alert text-dark" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test testing the background style and the text style
     */
    public function testBackgroundAndTextSet()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setBgStyle('primary')->setTextStyle('warning');
        $this->assertEquals('<div class="alert alert-primary text-warning" role="alert">Well done!</div>', $view_helper->__toString());
    }

    /**
     * Test setting a heading, default heading level
     */
    public function testHeading()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setHeading('Heading');
        $this->assertEquals(
            '<div class="alert" role="alert"><h4 class="alert-heading">Heading</h4>Well done!</div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test setting a heading with h2 option
     */
    public function testHeadingSetToH2()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('Well done!')->setHeading('Heading', 2);
        $this->assertEquals(
            '<div class="alert" role="alert"><h2 class="alert-heading">Heading</h2>Well done!</div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test setting a heading, set to H2 with HTML message
     */
    public function testHeadingSetToH2WithHTMLMessage()
    {
        $view_helper = new Bootstrap4Alert();
        $view_helper->__invoke('<p>Well done!</p>')->setHeading('Heading', 2);
        $this->assertEquals(
            '<div class="alert" role="alert"><h2 class="alert-heading">Heading</h2><p>Well done!</p></div>',
            $view_helper->__toString()
        );
    }
}
