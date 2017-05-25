<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 3 label
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap3Label extends AbstractHelper
{
    /**
     * @var string Button label
     */
    private $label;

    /**
     * @var string Button style
     */
    private $style;

    /**
     * @var array Bootstrap styles
     */
    private $supported_styles = [
        'default',
        'primary',
        'success',
        'info',
        'warning',
        'danger'
    ];

    /**
     * Entry point for the view helper
     *
     * @param string $label
     *
     * @return Bootstrap3Label
     */
    public function __invoke(string $label): Bootstrap3Label
    {
        $this->reset();

        $this->label = $label;

        return $this;
    }

    /**
     * Set the style for the badge, one of the following, default, primary, success,
     * info, warning or danger. If an incorrect style is passed in we set the style to
     * label-default
     *
     * @param string $style
     *
     * @return Bootstrap3Label
     */
    public function setStyle(string $style): Bootstrap3Label
    {
        if (in_array($style, $this->supported_styles) === true) {
            $this->style = $style;
        } else {
            $this->style = 'default';
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
        $this->label = null;
        $this->style = null;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        return '<span class="label' . $this->classes() . '">' .
            $this->view->escapeHtml($this->label) . '</span>';
    }

    /**
     * Generate the classes for the button based on the options set
     *
     * @return string
     */
    private function classes(): string
    {
        $classes = '';

        if ($this->style !== null) {
            $classes .= ' label-' . $this->style;
        }

        return $classes;
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
