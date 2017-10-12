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
}
