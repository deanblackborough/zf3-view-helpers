<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

class TestHelper extends AbstractHelper
{
    public function __invoke()
    {
        return $this;
    }

    public function render() : string
    {
        return '<p>Test composer renderer....woohoo!</p>';
    }
}
