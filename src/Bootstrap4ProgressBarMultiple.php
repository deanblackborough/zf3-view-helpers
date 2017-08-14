<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use PHPUnit\Runner\Exception;
use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 progress bar
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4ProgressBarMultiple extends AbstractHelper
{
    /**
     * @var array Progress bar values
     */
    private $values;

    /**
     * @var array Background colours for progress bars
     */
    private $colors;

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
     * @param array $values Progress bar values, array of integers
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function __invoke(array $values): Bootstrap4ProgressBarMultiple
    {
        $this->reset();

        $this->values = $values;

        return $this;
    }

    /**
     * Set the background colors for the progress bar, each value in the array needs to be one of the
     * following, success, info, warning or danger. If an incorrect style is passed in we don't apply the
     * class. The number of entries in the array needs to match the number of progress bar values
     *
     * @param array $colors
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function color(array $colors): Bootstrap4ProgressBarMultiple
    {
        if (count($colors) !== count($this->values)) {
            throw new Exception('Number of progress bar colours needs to match the number or progress bar values');
        }

        foreach ($colors as $color) {
            if (in_array($color, $this->supported_styles) === true) {
                $this->colors[] = $color;
            }
        }

        return $this;
    }

    /**
     * Enable the striped style for the progress bar background
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function striped() : Bootstrap4ProgressBarMultiple
    {
        $this->striped = true;

        return $this;
    }

    /**
     * Animate the striped background style
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function animate() : Bootstrap4ProgressBarMultiple
    {
        $this->animate = true;

        return $this;
    }

    /**
     * Set the label for the progress bar
     *
     * @param string $label
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function label(string $label) : Bootstrap4ProgressBarMultiple
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Set the height of the progress bar
     *
     * @param integer $height
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function height(int $height) : Bootstrap4ProgressBarMultiple
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
        $this->values = [];
        $this->colors = [];
        $this->striped = false;
        $this->animate = false;
        $this->label = null;
        $this->height = null;
    }

    /**
     * Generate the style attributes for the progress bar
     *
     * @param integer $value
     *
     * @return string
     */
    private function styles(int $value) : string
    {
        $styles = '';

        if ($value > 0) {
            $styles .= ' width: ' . $value . '%;';
        }

        if ($this->height !== null && $this->height > 0) {
            $styles .= ' height: ' . $this->height . 'px;';
        }

        return $styles;
    }

    /**
     * Generate the additional classes
     *
     * @param string $color
     *
     * @return string
     */
    private function classes(string $color) : string
    {
        $classes = '';

        if ($color !== null) {
            $classes .= ' bg-' . $color;
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
        $html = '<div class="progress">';

        foreach ($this->values as $k => $value) {
            $styles = $this->styles($value);
            if (strlen($styles) > 0) {
                $styles = 'style="' . $this->view->escapeHtmlAttr(trim($styles)) . '"';
            }

            $html .= '<div class="progress-bar' . $this->classes($this->colors[$k]) . '" role="progressbar" ' .
                $styles . ' aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100">' .
                (($this->label !== null) ? $this->view->escapeHtml($this->label) : null) . '</div>' . PHP_EOL;
        }

        $html .= '</div>';

        return $html;
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
