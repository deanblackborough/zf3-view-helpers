<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Exception;

/**
 * Generate a Bootstrap 4 progress bar
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4ProgressBarMultiple extends Bootstrap4Helper
{
    /**
     * @var array Progress bar values
     */
    private $values;

    /**
     * @var boolean Enabled the striped style
     */
    private $striped;

    /**
     * @var boolean Animate the progress bar style
     */
    private $animate;

    /**
     * @var integer Height of progress bar in pixels
     */
    private $height;

    /**
     * @var array Background colors
     */
    private $bg_colors;

    /**
     * Entry point for the view helper
     *
     * @param array $values Progress bar values, array of integers
     * @param array $colors Utility colours to use for each progress bar
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function __invoke(array $values, array $colors): Bootstrap4ProgressBarMultiple
    {
        $this->reset();

        $this->values = $values;

        $this->bgStyles($colors);

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
     * Set the background colour for each of the progress bars, values need to be one of the following, primary,
     * secondary, success, danger, warning, info, light, dark or white
     *
     * @param array $colors
     *
     * @throws Exception
     */
    private function bgStyles(array $colors) : void
    {
        if (count($colors) !== count($this->values)) {
            throw new Exception('Number of progress bar colours needs to match the number or progress bar values');
        }

        foreach ($colors as $color) {
            if (in_array($color, $this->supported_bg_styles) === true) {
                $this->bg_colors[] = $color;
            }
        }
    }

    /**
     * Set the height of the progress bar
     *
     * @param integer $height
     *
     * @return Bootstrap4ProgressBarMultiple
     */
    public function setHeight(int $height) : Bootstrap4ProgressBarMultiple
    {
        $this->height = $height;

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
     * Generate the additional classes
     *
     * @param string $color
     *
     * @return string
     */
    private function classes(string $color) : string
    {
        $classes = '';

        if ($this->striped === true) {
            $classes .= ' progress-bar-striped';
        }

        if ($this->animate === true) {
            $classes .= ' progress-bar-animated';
        }

        if ($color !== null) {
            $classes .= ' bg-' . $color;
        }

        return $classes;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render() : string
    {
        $html = '<div class="progress">';

        foreach ($this->values as $k => $value) {
            $styles = $this->styles($value);
            if (strlen($styles) > 0) {
                $styles = 'style="' . trim($styles) . '"';
            }

            $html .= '<div class="progress-bar' . $this->classes($this->bg_colors[$k]) . '" role="progressbar" ' .
                $styles . ' aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100"></div>';
        }

        $html .= '</div>';

        return $html;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset(): void
    {
        $this->values = [];
        $this->bg_colors = [];
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
            $styles .= ' height:' . $this->height . 'px;';
        }

        return $styles;
    }
}
