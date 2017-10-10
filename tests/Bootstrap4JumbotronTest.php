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
}
