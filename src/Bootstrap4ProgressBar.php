<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 progress bar
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4ProgressBar extends Bootstrap4Helper
{
    /**
     * @var integer Current progress bar value
     */
    private $value;

    /**
     * @var boolean Enabled the striped style
     */
    private $striped;

    /**
     * @var boolean Animate the progress bar style
     */
    private $animate;

    /**
     * @var string Label for progress bar
     */
    private $label;

    /**
     * @var integer Height of progress bar in pixels
     */
    private $height;

    /**
     * Entry point for the view helper
     *
     * @param integer $value Current progress bar value
     *
     * @return Bootstrap4ProgressBar
     */
    public function __invoke(int $value): Bootstrap4ProgressBar
    {
        $this->reset();

        $this->value = $value;

        return $this;
    }

    /**
     * Animate the striped background style
     *
     * @return Bootstrap4ProgressBar
     */
    public function animate() : Bootstrap4ProgressBar
    {
        $this->animate = true;

        return $this;
    }

    /**
     * Set the height of the progress bar
     *
     * @param integer $height
     *
     * @return Bootstrap4ProgressBar
     */
    public function height(int $height) : Bootstrap4ProgressBar
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Set the label for the progress bar
     *
     * @param string $label
     *
     * @return Bootstrap4ProgressBar
     */
    public function label(string $label) : Bootstrap4ProgressBar
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4ProgressBar
     */
    public function setBgStyle(string $color) : Bootstrap4ProgressBar
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
     * @return Bootstrap4ProgressBar
     */
    public function setTextStyle(string $color) : Bootstrap4ProgressBar
    {
        $this->assignTextStyle($color);

        return $this;
    }

    /**
     * Enable the striped style for the progress bar background
     *
     * @return Bootstrap4ProgressBar
     */
    public function striped() : Bootstrap4ProgressBar
    {
        $this->striped = true;

        return $this;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render() : string
    {
        $styles = $this->styles();
        if (strlen($styles) > 0) {
            $styles = 'style="' . trim($styles) . '"';
        }

        return '<div class="progress"><div class="progress-bar' . $this->classes() .
            '" role="progressbar" ' . $styles . ' aria-valuenow="' . $this->value .
            '" aria-valuemin="0" aria-valuemax="100">' .
            (($this->label !== null) ? $this->label : null) . '</div></div>';
    }

    /**
     * Generate the additional classes
     *
     * @return string
     */
    private function classes() : string
    {
        $classes = '';

        if ($this->bg_color !== null) {
            $classes .= ' bg-' . $this->bg_color;
        }

        if ($this->text_color !== null) {
            $classes .= ' text-' . $this->text_color;
        }

        if ($this->striped === true) {
            $classes .= ' progress-bar-striped';
        }

        if ($this->animate === true) {
            $classes .= ' progress-bar-animated';
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
        $this->value = 0;
        $this->bg_color = null;
        $this->striped = false;
        $this->animate = false;
        $this->label = null;
        $this->height = null;
    }

    /**
     * Generate the style attributes for the progress bar
     *
     * @return string
     */
    private function styles() : string
    {
        $styles = '';

        if ($this->value > 0) {
            $styles .= ' width: ' . $this->value . '%;';
        }

        if ($this->height !== null && $this->height > 0) {
            $styles .= ' height: ' . $this->height . 'px;';
        }

        return $styles;
    }
}
