<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 Jumbotron component
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Jumbotron extends AbstractHelper
{
    /**
     * @var array Supported display levels for heading
     */
    private $supported_display_levels = [ 1, 2, 3, 4];

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
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Jumbotron
     */
    public function __invoke(string $heading, string $content)
    {
        $this->reset();

        $this->heading = $heading;
        $this->content = $content;

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
     * Set the display level class for a heading title, display-1-4
     *
     * @param integer $level [1-4]
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Jumbotron
     */
    public function headingDisplayLevel(int $level)
    {
        if (in_array($level, $this->supported_display_levels) === true) {
            $this->display_level = $level;
        }

        return $this;
    }

    /**
     * Add the fluid class to make Jumbotron full width and without rounded corners
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Jumbotron
     */
    public function fluid()
    {
        $this->fluid = true;

        return $this;
    }

    /**
     * Set an option sub heading, added to the end of the heading inside small tags
     *
     * @param string $sub_heading
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Jumbotron
     */
    public function subHeading(string $sub_heading)
    {
        $this->sub_heading = $sub_heading;

        return $this;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render() : string
    {
        $html = '<div class="jumbotron' .
            (($this->fluid === true) ? ' jumbotron-fluid' : null) .
            '">' .
            (($this->fluid === true) ? '<div class="container">' : null) .
            '<h1' .
            (($this->display_level !== null) ? ' class="display-' . $this->display_level . '"' : null) .
            '>' . $this->heading .
            (($this->sub_heading !== null) ? '<small>' . $this->sub_heading . '</small>' : null) .
            '</h1>' . $this->content .
            (($this->fluid === true) ? '</div>' : null) .
            '</div>';

        return $html;
    }

    /**
     * Override the __toString() method to allow echo/print of the view helper directly, saves a
     * call to render()
     *
     * @return string
     */
    public function __toString() : string
    {
        return $this->render();
    }
}
