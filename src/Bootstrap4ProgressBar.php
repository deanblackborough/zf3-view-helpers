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
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset(): void
    {
        $this->value = 0;
    }

    /**
     * Generate the style attributes for the progress bar
     *
     * @return string
     */
    private function style() : string
    {
        $style = '';

        if ($this->value > 0) {
            $style .= $this->value . '%;';
        }

        return $style;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        $style = $this->style();
        if (strlen($style) > 0) {
            $style = 'style="' . $style . '"';
        }

        return '
            <div class="progress">
                <div class="progress-bar" role="progressbar" ' . $style . ' aria-valuenow="' . $this->value .
            '" aria-valuemin="0" aria-valuemax="100"></div>
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
