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
    private $bg_style;

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
     * Set the background style for the progress bad, one of the following, success, info,
     * warning or danger. If an incorrect style is passed in we don't apply the class.
     *
     * @param string $style
     *
     * @return Bootstrap4ProgressBar
     */
    public function setBackgroundStyle(string $style): Bootstrap4ProgressBar
    {
        if (in_array($style, $this->supported_styles) === true) {
            $this->bg_style = $style;
        }

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
        $this->bg_style = null;
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
            $styles .= $this->value . '%;';
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
        $classes = null;

        if ($this->bg_style !== null) {
            $classes .= ' bg-' . $this->bg_style;
        }

        return $classes;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        $style = $this->styles();
        if (strlen($style) > 0) {
            $style = 'style="' . $style . '"';
        }

        return '
            <div class="progress">
                <div class="progress-bar' . $this->classes() . '" role="progressbar" ' . $style .
                ' aria-valuenow="' . $this->value . '" aria-valuemin="0" aria-valuemax="100"></div>
            </div>';
    }

    /**
     * Override the __toString() method to allow echo/print of the view helper directly,
     * saves a call to render()
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
