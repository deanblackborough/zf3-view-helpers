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
}
