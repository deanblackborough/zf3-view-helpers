<?php

require __DIR__ . '../../vendor/autoload.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4NavbarLite;

/**
 * There are only a few tests for the lite navbar because it will be replaced by the real navbar view helper, I
 * imagine I will then create a new little view helper under a different name
 */

final class Bootstrap4NavbarLiteTest extends PHPUnit\Framework\TestCase
{
    private $navigation = [
        ['uri' => '#1', 'label' => 'Item 1', 'active' => false ],
        ['uri' => '#2', 'label' => 'Item 2', 'active' => true ],
        ['uri' => '#3', 'label' => 'Item 3', 'active' => false ]
    ];

    /**
     * Test default call
     */
    public function testDefault()
    {
        $view_helper = new Bootstrap4NavbarLite();
        $view_helper->__invoke()
            ->addNavigation($this->navigation);
        $this->assertEquals(
            '<nav class="navbar navbar-expand-lg navbar-light bg-light" ><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarSupportedContent"><ul class="navbar-nav mr-auto"><li class="nav-item"><a class="nav-link" href="#1">Item 1</a></li><li class="nav-item active"><a class="nav-link" href="#2">Item 2</a></li><li class="nav-item"><a class="nav-link" href="#3">Item 3</a></li></ul></div></nav>',
            $view_helper->__toString()
        );
    }

    /**
     * Test set brand
     */
    public function testSetBrand()
    {
        $view_helper = new Bootstrap4NavbarLite();
        $view_helper->__invoke()
            ->addNavigation($this->navigation)
            ->addBrand('Brand', '#');
        $this->assertEquals(
            '<nav class="navbar navbar-expand-lg navbar-light bg-light" ><a class="navbar-brand" href="#">Brand</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarSupportedContent"><ul class="navbar-nav mr-auto"><li class="nav-item"><a class="nav-link" href="#1">Item 1</a></li><li class="nav-item active"><a class="nav-link" href="#2">Item 2</a></li><li class="nav-item"><a class="nav-link" href="#3">Item 3</a></li></ul></div></nav>',
            $view_helper->__toString()
        );
    }
}
