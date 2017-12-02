<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 badge
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Badge extends Bootstrap4Helper
{
    /**
     * @var string Button label
     */
    private $label;

    /**
     * @var string Button style
     */
    private $style;

    /**
     * @var boolean Apply the pill style
     */
    private $pill;

    /**
     * @var boolean URI if in link mode
     */
    private $uri;

    /**
     * Entry point for the view helper
     *
     * @param string $label
     *
     * @return Bootstrap4Badge
     */
    public function __invoke(string $label): Bootstrap4Badge
    {
        $this->reset();

        $this->label = $label;

        return $this;
    }

    /**
     * Render the badge as a link
     *
     * @param string $uri
     *
     * @return Bootstrap4Badge
     */
    public function asLink(string $uri) : Bootstrap4Badge
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Set the pill option
     *
     * @return Bootstrap4Badge
     */
    public function pill(): Bootstrap4Badge
    {
        $this->pill = true;

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Badge
     */
    public function setBgStyle(string $color) : Bootstrap4Badge
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
     * @return Bootstrap4Badge
     */
    public function setTextStyle(string $color) : Bootstrap4Badge
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
        if ($this->uri === null) {
            return '<span class="badge' . $this->classes() . '">' . $this->label . '</span>';
        } else {
            return '<a href="' . $this->uri . '" class="badge' . $this->classes() . '">' . $this->label . '</a>';
        }
    }

    /**
     * Generate the classes for the button based on the options set
     *
     * @return string
     */
    private function classes(): string
    {
        $classes = '';

        if ($this->bg_color !== null) {
            $classes = ' badge-' . $this->bg_color;
        }

        if ($this->text_color !== null) {
            $classes .= ' text-' . $this->text_color;
        }

        if ($this->pill === true) {
            $classes .= ' badge-pill';
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
        $this->label = null;
        $this->style = null;
        $this->pill = false;
        $this->uri = null;
    }
}
