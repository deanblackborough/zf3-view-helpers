<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 3 progress bar
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap3ProgressBar extends AbstractHelper
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
     * @return Bootstrap3ProgressBar
     */
    public function __invoke(int $value): Bootstrap3ProgressBar
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
     * @return Bootstrap3ProgressBar
     */
    public function color(string $color): Bootstrap3ProgressBar
    {
        if (in_array($color, $this->supported_styles) === true) {
            $this->color = $color;
        }

        return $this;
    }

    /**
     * Enable the striped style for the progress bar background
     *
     * @return Bootstrap3ProgressBar
     */
    public function striped() : Bootstrap3ProgressBar
    {
        $this->striped = true;

        return $this;
    }

    /**
     * Animate the striped background style
     *
     * @return Bootstrap3ProgressBar
     */
    public function animate() : Bootstrap3ProgressBar
    {
        $this->animate = true;

        return $this;
    }

    /**
     * Set the label for the progress bar
     *
     * @param string $label
     *
     * @return Bootstrap3ProgressBar
     */
    public function label(string $label) : Bootstrap3ProgressBar
    {
        $this->label = $label;

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
            $classes .= ' progress-bar-' . $this->color;
        }

        if ($this->striped === true) {
            $classes .= ' progress-bar-striped';
        }

        if ($this->animate === true) {
            $classes .= ' progress-bar-animated';
        }

        return $this->view->escapeHtmlAttr($classes);
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render() : string
    {
        $styles = $this->styles();
        if (strlen($styles) > 0) {
            $styles = 'style="' . $this->view->escapeHtmlAttr(trim($styles)) . '"';
        }

        return '
            <div class="progress">
                <div class="progress-bar' . $this->classes() . '" role="progressbar" ' . $styles .
            ' aria-valuenow="' . $this->value . '" aria-valuemin="0" aria-valuemax="100">' .
            (($this->label !== null) ? $this->view->escapeHtml($this->label) : null) . '</div>
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
