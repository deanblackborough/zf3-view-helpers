<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 3 Jumbotron component
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap3Jumbotron extends AbstractHelper
{
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
     * @return Bootstrap3Jumbotron
     */
    public function __invoke(string $heading, string $content) : Bootstrap3Jumbotron
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
        $this->fluid = false;
    }

    /**
     * Add the fluid class to make Jumbotron full width and without rounded corners
     *
     * @return Bootstrap3Jumbotron
     */
    public function fluid() : Bootstrap3Jumbotron
    {
        $this->fluid = true;

        return $this;
    }

    /**
     * Set an option sub heading, added to the end of the heading inside small tags
     *
     * @param string $sub_heading
     *
     * @return Bootstrap3Jumbotron
     */
    public function subHeading(string $sub_heading) : Bootstrap3Jumbotron
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
        $html = '<div class="jumbotron">' .
            (($this->fluid === true) ? '<div class="container">' : null) .
            '<h1>' . $this->view->escapeHtml($this->heading) .
            (($this->sub_heading !== null) ? '<small>' .
            $this->view->escapeHtml($this->sub_heading) . '</small>' : null) .
            '</h1>' . $this->view->escapeHtml($this->content) .
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
