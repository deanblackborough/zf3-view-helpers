<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 alert component
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Alert extends Bootstrap4Helper
{
    /**
     * @var string Alter message
     */
    private $message;

    /**
     * @var string Optional heading
     */
    private $heading;

    /**
     * @var integer Optional heading level, if null will default to 4
     */
    private $heading_level;

    /**
     * Entry point for the view helper
     *
     * @param string $message HTML content to display inside the alert
     *
     * @return Bootstrap4Alert
     */
    public function __invoke(string $message): Bootstrap4Alert
    {
        $this->reset();

        $this->message = $message;

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
     * Set an optional heading for the alert
     *
     * @param string $heading
     * @param integer $heading_level Optional heading level, 1-7 defaults to 4
     *
     * @return Bootstrap4Alert
     */
    public function setHeading(string $heading, int $heading_level = 4) : Bootstrap4Alert
    {
        $this->heading = $heading;
        $this->heading_level = $heading_level;

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
        $html = '<div class="' . $this->classes() . '" role="alert">';
        if ($this->heading !== null) {
            $html .= '<h' . $this->heading_level . ' class="alert-heading">' .
                $this->heading . '</h' . $this->heading_level . '>';
        }
        $html .= $this->message . '</div>';

        return $html;
    }

    /**
     * Generate the classes for the alert component based on the set options
     *
     * @return string
     */
    private function classes(): string
    {
        $classes = 'alert';

        if ($this->bg_color !== null) {
            $classes .= ' alert-' . $this->bg_color;
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
        $this->message = null;
        $this->heading = null;
        $this->heading_level = null;
    }
}
