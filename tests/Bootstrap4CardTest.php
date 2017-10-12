<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Card;

final class Bootstrap4CardTest extends PHPUnit\Framework\TestCase
{
    public function testDefault()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body');
        $this->assertEquals(
            '<div class="card"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test setting a width via styles
     */
    public function testWidth()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke('', 'width:20px;')
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body');
        $this->assertEquals(
            '<div class="card" style="width:20px;"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test assigning a style via invoke
     */
    public function testStyleViaInvoke()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke('bg-primary')
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body');
        $this->assertEquals(
            '<div class="card bg-primary"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test assigning width and style via invoke
     */
    public function testAttrAndStyle()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke('bg-primary', 'width:20px;')
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body');
        $this->assertEquals(
            '<div class="card bg-primary" style="width:20px;"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, primary
     */
    public function testBgStylePrimary()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('primary');
        $this->assertEquals(
            '<div class="card bg-primary"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, secondary
     */
    public function testBgStyleSecondary()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('secondary');
        $this->assertEquals(
            '<div class="card bg-secondary"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, success
     */
    public function testBgStyleSuccess()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('success');
        $this->assertEquals(
            '<div class="card bg-success"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, danger
     */
    public function testBgStyleDanger()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('danger');
        $this->assertEquals(
            '<div class="card bg-danger"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, warning
     */
    public function testBgStyleWarning()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('warning');
        $this->assertEquals(
            '<div class="card bg-warning"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, info
     */
    public function testBgStyleInfo()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('info');
        $this->assertEquals(
            '<div class="card bg-info"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, light
     */
    public function testBgStyleLight()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('light');
        $this->assertEquals(
            '<div class="card bg-light"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, dark
     */
    public function testBgStyleDark()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('dark');
        $this->assertEquals(
            '<div class="card bg-dark"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, white
     */
    public function testBgStyleWhite()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('white');
        $this->assertEquals(
            '<div class="card bg-white"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, primary
     */
    public function testTextStyleWhite()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('primary');
        $this->assertEquals(
            '<div class="card text-primary"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, secondary
     */
    public function testTextStyleSecondary()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('secondary');
        $this->assertEquals(
            '<div class="card text-secondary"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, success
     */
    public function testTextStyleSuccess()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('success');
        $this->assertEquals(
            '<div class="card text-success"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, danger
     */
    public function testTextStyleDanger()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('danger');
        $this->assertEquals(
            '<div class="card text-danger"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, warning
     */
    public function testTextStyleWarning()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('warning');
        $this->assertEquals(
            '<div class="card text-warning"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, info
     */
    public function testTextStyleInfo()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('info');
        $this->assertEquals(
            '<div class="card text-info"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, light
     */
    public function testTextStyleLight()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('light');
        $this->assertEquals(
            '<div class="card text-light"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, dark
     */
    public function testTextStyleDark()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('dark');
        $this->assertEquals(
            '<div class="card text-dark"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test text style, invalid
     */
    public function testTextStyleInvalid()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setTextStyle('invalid');
        $this->assertEquals(
            '<div class="card"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test bg style, invalid
     */
    public function testBgStyleInvalid()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setBgStyle('invalid');
        $this->assertEquals(
            '<div class="card"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test setting a header
     */
    public function testSetHeader()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setHeader('Header');
        $this->assertEquals(
            '<div class="card"><div class="card-header">Header</div><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test setting a footer
     */
    public function testSetFooter()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setFooter('Footer');
        $this->assertEquals(
            '<div class="card"><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div><div class="card-footer">Footer</div></div>',
            $view_helper->__toString()
        );
    }

    /**
     * Test setting a header and footer
     */
    public function testSetHeaderAndFooter()
    {
        $view_helper = new Bootstrap4Card();
        $view_helper->__invoke()
            ->addTitleToBody('Title')
            ->addTextToBody('Text for card body')
            ->setFooter('Footer')
            ->setHeader('Header');
        $this->assertEquals(
            '<div class="card"><div class="card-header">Header</div><div class="card-body"><h4 class="card-title">Title</h4><p class="card-text">Text for card body</p></div><div class="card-footer">Footer</div></div>',
            $view_helper->__toString()
        );
    }
}
