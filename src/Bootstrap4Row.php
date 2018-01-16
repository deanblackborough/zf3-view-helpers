<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 row
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Row extends Bootstrap4Helper
{
    /**
     * Entry point for the view helper
     *
     * @return Bootstrap4Row
     */
    public function __invoke(): Bootstrap4Row
    {
        $this->reset();

        return $this;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset(): void
    {

    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render(): string
    {
        $html = '';

        return $html;
    }
}
