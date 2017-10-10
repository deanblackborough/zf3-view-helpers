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
            ->bgStyle('primary');
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
            ->textStyle('primary');
        $this->assertEquals(
            '<div class="jumbotron text-primary"><h1 class="display-1">Heading</h1><p>Content</p></div>',
            $view_helper->__toString()
        );
    }
}
