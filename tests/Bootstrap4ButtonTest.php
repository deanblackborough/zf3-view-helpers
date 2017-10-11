<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Button;

final class Bootstrap4ButtonTest extends \PHPUnit\Framework\TestCase
{
    public function testDefault()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button');
        $this->assertEquals(
            '<a href="#" class="btn" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Set the active status
     */
    public function testActiveStatus()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->active();
        $this->assertEquals(
            '<a href="#" class="btn active" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Switch to block layout
     */
    public function testBlockLayout()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->block();
        $this->assertEquals(
            '<a href="#" class="btn btn-block" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Disabled status, a tag version of button
     */
    public function testDisabledStatus()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->disabled();
        $this->assertEquals(
            '<a href="#" class="btn disabled" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Large button
     */
    public function testLargeOption()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->large();
        $this->assertEquals(
            '<a href="#" class="btn btn-lg" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Small button
     */
    public function testSmallOption()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->small();
        $this->assertEquals(
            '<a href="#" class="btn btn-sm" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Set the button href
     */
    public function testHref()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setUri('uri');
        $this->assertEquals(
            '<a href="uri" class="btn" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Primary style
     */
    public function testStylePrimary()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('primary');
        $this->assertEquals(
            '<a href="#" class="btn btn-primary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Secondary style
     */
    public function testStyleSecondary()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('secondary');
        $this->assertEquals(
            '<a href="#" class="btn btn-secondary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Success style
     */
    public function testStyleSuccess()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('success');
        $this->assertEquals(
            '<a href="#" class="btn btn-success" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Danger style
     */
    public function testStyleDanger()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('danger');
        $this->assertEquals(
            '<a href="#" class="btn btn-danger" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Warning style
     */
    public function testStyleWarning()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('warning');
        $this->assertEquals(
            '<a href="#" class="btn btn-warning" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Warning style
     */
    public function testStyleInfo()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('info');
        $this->assertEquals(
            '<a href="#" class="btn btn-info" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Light style
     */
    public function testStyleLight()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('light');
        $this->assertEquals(
            '<a href="#" class="btn btn-light" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Dark style
     */
    public function testStyleDark()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('dark');
        $this->assertEquals(
            '<a href="#" class="btn btn-dark" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Link style
     */
    public function testStyleLink()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('link');
        $this->assertEquals(
            '<a href="#" class="btn btn-link" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Invalid style
     */
    public function testStyleInvalid()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setBgStyle('invalid');
        $this->assertEquals(
            '<a href="#" class="btn" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline primary style
     */
    public function testStylePrimaryOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('primary');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-primary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline secondary style
     */
    public function testStyleSecondaryOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('secondary');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-secondary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline success style
     */
    public function testStyleSuccessOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('success');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-success" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline danger style
     */
    public function testStyleDangerOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('danger');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-danger" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline Warning style
     */
    public function testStyleWarningOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('warning');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-warning" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline info style
     */
    public function testStyleInfoOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('info');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-info" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline Light style
     */
    public function testStyleLightOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('light');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-light" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Outline dark style
     */
    public function testStyleDarkOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('dark');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-dark" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Invalid outline style
     */
    public function testStyleInvalidOutline()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setOutlineStyle('invalid');
        $this->assertEquals(
            '<a href="#" class="btn btn-outline-primary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Button layout
     */
    public function testLayoutButton()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setModeButton();
        $this->assertEquals(
            '<button class="btn" type="submit">Button</button>',
            $view_helper->__toString()
        );
    }

    /**
     * Input layout: button
     */
    public function testLayoutInputButton()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setModeInput('button');
        $this->assertEquals(
            '<input class="btn" type="button" value="Button" />',
            $view_helper->__toString()
        );
    }

    /**
     * Input layout: submit
     */
    public function testLayoutInputSubmit()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setModeInput('submit');
        $this->assertEquals(
            '<input class="btn" type="submit" value="Button" />',
            $view_helper->__toString()
        );
    }

    /**
     * Input layout: reset
     */
    public function testLayoutInputReset()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setModeInput('reset');
        $this->assertEquals(
            '<input class="btn" type="reset" value="Button" />',
            $view_helper->__toString()
        );
    }

    /**
     * Input layout: Invalid option
     */
    public function testLayoutInputInvalid()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')->setModeInput('invalid');
        $this->assertEquals(
            '<input class="btn" type="button" value="Button" />',
            $view_helper->__toString()
        );
    }

    /**
     * Text style primary
     */
    public function testTextStylePrimary()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('primary');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-primary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style secondary
     */
    public function testTextStyleSecondary()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('secondary');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-secondary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style success
     */
    public function testTextStyleSuccess()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('success');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-success" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style danger
     */
    public function testTextStyleDanger()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('danger');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-danger" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style warning
     */
    public function testTextStyleWarning()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('warning');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-warning" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style warning
     */
    public function testTextStyleInfo()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('info');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-info" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style light
     */
    public function testTextStyleLight()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('light');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-light" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Text style dark
     */
    public function testTextStyleDark()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('light')
            ->setTextStyle('dark');
        $this->assertEquals(
            '<a href="#" class="btn btn-light text-dark" role="button">Button</a>',
            $view_helper->__toString()
        );
    }

    /**
     * Combined test
     */
    public function testCombined()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button')
            ->setBgStyle('dark')
            ->setTextStyle('light')
            ->large()
            ->active()
            ->block();
        $this->assertEquals(
            '<a href="#" class="btn btn-dark text-light btn-lg btn-block active" role="button">Button</a>',
            $view_helper->__toString()
        );
    }
}
