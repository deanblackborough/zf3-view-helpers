<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 alert componenet
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Alert extends Bootstrap4Helper
{
    /**
     * Entry point for the view helper
     *
     * @return Bootstrap4Alert
     */
    public function __invoke(): Bootstrap4Alert
    {
        $this->reset();

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Alert
     */
    public function setBgStyle(string $color) : Bootstrap4Alert
    {
        $this->assignBgStyle($color);

        return $this;
    }

    /**
     * Set the text color for the component, need to be one of the following, primary, secondary, success, danger,
     * warning, info, light or dark, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Alert
     */
    public function setTextStyle(string $color) : Bootstrap4Alert
    {
        $this->assignTextStyle($color);

        return $this;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render(): string
    {
        return '';
    }

    /**
     * Generate the classes for the alert component based on the set options
     *
     * @return string
     */
    private function classes(): string
    {
        $classes = '';

        if ($this->bg_color !== null) {
            $classes = ' alert-' . $this->bg_color;
        }

        if ($this->text_color !== null) {
            $classes .= ' text-' . $this->text_color;
        }

        return $classes;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset(): void
    {

    }
}
