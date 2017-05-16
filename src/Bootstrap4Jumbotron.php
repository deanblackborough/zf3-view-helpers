<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

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
        $this->heading = $heading;
        $this->content = $content;

        return $this;
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

    private function render() : string
    {
        $html = '<div class="jumbotron' .
            (($this->fluid === true) ? ' jumbotron-fluid' : null) . '">
            <h1' .
            (($this->display_level !== null) ? ' class="display-' . $this->display_level . '"' : null) .
            '>' . $this->heading . '</h1>' .
            $this->content .
            '</div>';

        return $html;
    }

    public function __toString() : string
    {
        return $this->render();
    }
}
