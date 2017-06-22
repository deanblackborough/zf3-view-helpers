<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 progress bar
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4ProgressBar extends AbstractHelper
{
    /**
     * @var integer Current progress bar value
     */
    private $value;

    /**
     * @var string Assigned an alternate background colour
     */
    private $color;

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
     * @var array Bootstrap styles
     */
    private $supported_styles = [
        'success',
        'info',
        'warning',
        'danger',
    ];

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
     * Set the background color for the progress bar, one of the following, success, info,
     * warning or danger. If an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4ProgressBar
     */
    public function color(string $color): Bootstrap4ProgressBar
    {
        if (in_array($color, $this->supported_styles) === true) {
            $this->color = $color;
        }

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
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset(): void
    {
        $this->value = 0;
        $this->color = null;
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

    /**
     * Generate the additional classes
     *
     * @return string
     */
    private function classes() : string
    {
        $classes = '';

        if ($this->color !== null) {
            $classes .= ' bg-' . $this->color;
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
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render() : string
    {
        $styles = $this->styles();
        if (strlen($styles) > 0) {
            $styles = 'style="' . trim($styles) . '"';
        }

        return '
            <div class="progress">
                <div class="progress-bar' . $this->classes() . '" role="progressbar" ' . $styles .
                ' aria-valuenow="' . $this->value . '" aria-valuemin="0" aria-valuemax="100">' .
                (($this->label !== null) ? $this->label : null) . '</div>
            </div>';
    }

    /**
     * Override the __toString() method to allow echo/print of the view helper directly,
     * saves a call to render()
     *
     * @return string
     */
    public function __toString() : string
    {
        return $this->render();
    }
}
