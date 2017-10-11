<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 Jumbotron component
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Jumbotron extends Bootstrap4Helper
{
    /**
     * @var array Supported display levels for heading
     */
    private $supported_display_levels = [ 1, 2, 3, 4 ];

    /**
     * @var integer|null Set display level
     */
    private $display_level = null;

    /**
     * @var boolean Apply the fluid class?
     */
    private $fluid = false;

    /**
     * @var string Heading for Jumbotron
     */
    private $heading;

    /**
     * @var string Sub heading for Jumbotron
     */
    private $sub_heading;

    /**
     * @var string Content for Jumbotron, HTML
     */
    private $content;

    /**
     * Entry point for the view helper
     *
     * @param string $heading
     * @param string $content
     *
     * @return Bootstrap4Jumbotron
     */
    public function __invoke(string $heading, string $content) : Bootstrap4Jumbotron
    {
        $this->reset();

        $this->heading = $heading;
        $this->content = $content;

        return $this;
    }

    /**
     * Add the fluid class to make Jumbotron full width and without rounded corners
     *
     * @return Bootstrap4Jumbotron
     */
    public function fluid() : Bootstrap4Jumbotron
    {
        $this->fluid = true;

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Jumbotron
     */
    public function setBgStyle($color) : Bootstrap4Jumbotron
    {
        $this->assignBgStyle($color);

        return $this;
    }

    /**
     * Set the display level class for a heading title, display-[1-4]
     *
     * @param integer $level [1-4]
     *
     * @return Bootstrap4Jumbotron
     */
    public function setHeadingDisplayLevel(int $level) : Bootstrap4Jumbotron
    {
        if (in_array($level, $this->supported_display_levels) === true) {
            $this->display_level = $level;
        }

        return $this;
    }

    /**
     * Set the text color for the component, need to be one of the following, primary, secondary, success, danger,
     * warning, info, light or dark, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Jumbotron
     */
    public function setTextStyle($color) : Bootstrap4Jumbotron
    {
        $this->assignTextStyle($color);

        return $this;
    }

    /**
     * Set an optional sub heading, added to the end of the heading inside small tags
     *
     * @param string $sub_heading
     *
     * @return Bootstrap4Jumbotron
     */
    public function setSubHeading(string $sub_heading) : Bootstrap4Jumbotron
    {
        $this->sub_heading = $sub_heading;

        return $this;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset() : void
    {
        $this->heading = null;
        $this->sub_heading = null;
        $this->content = null;
        $this->display_level = null;
        $this->fluid = false;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render() : string
    {
        $html = '<div class="jumbotron' .
            (($this->fluid === true) ? ' jumbotron-fluid' : null) .
            (($this->bg_color !== null) ? ' bg-' . $this->bg_color : null) .
            (($this->text_color !== null) ? ' text-' . $this->text_color : null) .
            '">' .
            (($this->fluid === true) ? '<div class="container">' : null) .
            '<h1 class="display-' . (($this->display_level !== null) ? $this->display_level : '1') .
            '">' . $this->heading .
            (($this->sub_heading !== null) ? ' <small>' .
            $this->sub_heading . '</small>' : null) .
            '</h1>' . $this->content .
            (($this->fluid === true) ? '</div>' : null) .
            '</div>';

        return $html;
    }
}
