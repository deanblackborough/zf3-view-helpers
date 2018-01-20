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
     * @var string Row content
     */
    private $content;

    /**
     * Entry point for the view helper
     *
     * @param string $content Row content
     *
     * @return Bootstrap4Row
     */
    public function __invoke(string $content): Bootstrap4Row
    {
        $this->reset();

        $this->content = $content;

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Row
     */
    public function setBgStyle(string $color) : Bootstrap4Row
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
     * @return Bootstrap4Row
     */
    public function setTextStyle(string $color) : Bootstrap4Row
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
        $html = '<div class="' . $this->classes() . '">' .
            $this->content .
            '</div>';

        return $html;
    }

    /**
     * Generate the classes string for the row
     *
     * @return string
     */
    private function classes() : string
    {
        $classes = 'row';

        if ($this->bg_color !== null) {
            $classes .= ' bg-' . $this->bg_color;
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
        $this->content = null;
    }
}
