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
        $view_helper->__invoke();
        $this->assertEquals('', $view_helper->__toString());
    }
}
