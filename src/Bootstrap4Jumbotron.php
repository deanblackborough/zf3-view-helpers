<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a bootstrap 4 view helper
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
     * @var string Content for Jumbotron, HTML
     */
    private $content;

    /**
     * Entry point for view helper
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
     * Reset properties in case the view helper is called multiple times
     *
     * @return void
     */
    private function reset() : void
    {
        $this->heading = null;
        $this->content = null;
        $this->display_level = null;
        $this->fluid = false;
    }

    /**
     * Set the display level setting for a heading title, 1-4
     *
     * @param integer $level
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
     * Add the fluid class to make Jumbotron full width
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Jumbotron
     */
    public function fluid()
    {
        $this->fluid = true;

        return $this;
    }

    /**
     * Worker method for the view helper, generates the HTML, private so that we
     * can echo the view helper directly
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
            '>' . $this->heading . '</h1>' .
            $this->content .
            (($this->fluid === true) ? '</div>' : null) .
            '</div>';

        return $html;
    }

    /**
     * Override the toString method to allow echo/print of the view helper directly
     *
     * @return string
     */
    public function __toString() : string
    {
        return $this->render();
    }
}
