<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 column, responsive classes set via method chaining
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Column extends Bootstrap4Helper
{
    /**
     * Entry point for the view helper
     *
     * @return Bootstrap4Column
     */
    public function __invoke(): Bootstrap4Column
    {
        $this->reset();

        return $this;
    }

    /**
     * Large 'lg' column
     *
     * @param integer $size
     *
     * @return Bootstrap4Column
     */
    public function lg(int $size): Bootstrap4Column
    {
        return $this;
    }

    /**
     * Medium 'md' column
     *
     * @param integer $size
     *
     * @return Bootstrap4Column
     */
    public function md(int $size): Bootstrap4Column
    {
        return $this;
    }

    /**
     * Small 'sm' column
     *
     * @param integer $size
     *
     * @return Bootstrap4Column
     */
    public function sm(int $size): Bootstrap4Column
    {
        return $this;
    }

    /**
     * Extra large 'xl' column
     *
     * @param integer $size
     *
     * @return Bootstrap4Column
     */
    public function xl(int $size): Bootstrap4Column
    {
        return $this;
    }

    /**
     * Extra small column
     *
     * @param integer $size
     *
     * @return Bootstrap4Column
     */
    public function xs(int $size): Bootstrap4Column
    {
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
