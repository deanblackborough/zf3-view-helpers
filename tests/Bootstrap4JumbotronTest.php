<?php

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '../../src/Bootstrap4Jumbotron.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Jumbotron;

final class Bootstrap4JumbotronTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test the default view helper call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>');
        $this->assertEquals(
            '<div class="jumbotron"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Add a sub heading
     */
    public function testSubHeading()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->subHeading('Sub heading');
        $this->assertEquals(
            '<div class="jumbotron"><h1 class="display-1">Heading <small>Sub heading</small></h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Add a sub heading
     */
    public function testFluidOption()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->fluid();
        $this->assertEquals(
            '<div class="jumbotron jumbotron-fluid"><div class="container"><h1 class="display-1">Heading</h1><p>Content</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Heading display-1
     */
    public function testHeadingDisplay1()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->headingDisplayLevel(1);
        $this->assertEquals(
            '<div class="jumbotron"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Heading display-2
     */
    public function testHeadingDisplay2()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->headingDisplayLevel(2);
        $this->assertEquals(
            '<div class="jumbotron"><h1 class="display-2">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Heading display-3
     */
    public function testHeadingDisplay3()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->headingDisplayLevel(3);
        $this->assertEquals(
            '<div class="jumbotron"><h1 class="display-3">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Heading display-4
     */
    public function testHeadingDisplay4()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->headingDisplayLevel(4);
        $this->assertEquals(
            '<div class="jumbotron"><h1 class="display-4">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style primary
     */
    public function testBgStylePrimary()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('primary');
        $this->assertEquals(
            '<div class="jumbotron bg-primary"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style secondary
     */
    public function testBgStyleSecondary()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('secondary');
        $this->assertEquals(
            '<div class="jumbotron bg-secondary"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style success
     */
    public function testBgStyleSuccess()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('success');
        $this->assertEquals(
            '<div class="jumbotron bg-success"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style danger
     */
    public function testBgStyleDanger()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('danger');
        $this->assertEquals(
            '<div class="jumbotron bg-danger"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style warning
     */
    public function testBgStyleWarning()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('warning');
        $this->assertEquals(
            '<div class="jumbotron bg-warning"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style info
     */
    public function testBgStyleInfo()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('info');
        $this->assertEquals(
            '<div class="jumbotron bg-info"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style light
     */
    public function testBgStyleLight()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('light');
        $this->assertEquals(
            '<div class="jumbotron bg-light"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style dark
     */
    public function testBgStyleDark()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('dark');
        $this->assertEquals(
            '<div class="jumbotron bg-dark"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style white
     */
    public function testBgStyleWhite()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('white');
        $this->assertEquals(
            '<div class="jumbotron bg-white"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set background style invalid
     */
    public function testBgStyleInvalid()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setBgStyle('invalid');
        $this->assertEquals(
            '<div class="jumbotron bg-primary"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style primary
     */
    public function testTextStylePrimary()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('primary');
        $this->assertEquals(
            '<div class="jumbotron text-primary"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style secondary
     */
    public function testTextStyleSecondary()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('secondary');
        $this->assertEquals(
            '<div class="jumbotron text-secondary"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style success
     */
    public function testTextStyleSuccess()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('success');
        $this->assertEquals(
            '<div class="jumbotron text-success"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style danger
     */
    public function testTextStyleDanger()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('danger');
        $this->assertEquals(
            '<div class="jumbotron text-danger"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style warning
     */
    public function testTextStyleWarning()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('warning');
        $this->assertEquals(
            '<div class="jumbotron text-warning"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style info
     */
    public function testTextStyleInfo()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('info');
        $this->assertEquals(
            '<div class="jumbotron text-info"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style light
     */
    public function testTextStyleLight()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('light');
        $this->assertEquals(
            '<div class="jumbotron text-light"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style dark
     */
    public function testTextStyleDark()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('dark');
        $this->assertEquals(
            '<div class="jumbotron text-dark"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Set text style invalid
     */
    public function testTextStyleInvalid()
    {
        $view_helper = new Bootstrap4Jumbotron();
        $view_helper->__invoke('Heading', '<p>Content</p>')
            ->setTextStyle('invalid');
        $this->assertEquals(
            '<div class="jumbotron text-dark"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }
}
