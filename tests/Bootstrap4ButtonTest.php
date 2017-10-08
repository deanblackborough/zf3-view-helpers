<?php

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '../../src/Bootstrap4Button.php';

use DBlackborough\Zf3ViewHelpers\Bootstrap4Button;

final class Bootstrap4ButtonTest extends \PHPUnit\Framework\TestCase
{
    public function testDefault()
    {
        $view_helper = new Bootstrap4Button();
        $view_helper->__invoke('Button');
        $this->assertEquals(
            '<a href="#" class="btn btn-primary" role="button">Button</a>',
            $view_helper->__toString()
        );
    }
}
