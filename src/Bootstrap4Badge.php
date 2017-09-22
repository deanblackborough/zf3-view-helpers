<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 badge
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Badge extends AbstractHelper
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
     * @var boolean Apply the pill style
     */
    private $pill;

    /**
     * @var array Bootstrap styles
     */
    private $supported_styles = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark'
    ];

    /**
     * Entry point for the view helper
     *
     * @param string $label
     *
     * @return Bootstrap4Badge
     */
    public function __invoke(string $label): Bootstrap4Badge
    {
        $this->reset();

        $this->label = $label;

        return $this;
    }

    /**
     * Set the style for the badge, one of the following, primary, secondary, success,
     * info, warning, danger or link. If an incorrect style is passed in we set the
     * style to badge-primary
     *
     * @param string $style
     *
     * @return Bootstrap4Badge
     */
    public function setStyle(string $style): Bootstrap4Badge
    {
        if (in_array($style, $this->supported_styles) === true) {
            $this->style = 'badge-' . $style;
        } else {
            $this->style = 'badge-primary';
        }

        return $this;
    }

    /**
     * Set the pill option
     *
     * @return Bootstrap4Badge
     */
    public function pill(): Bootstrap4Badge
    {
        $this->pill = true;

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
        $this->pill = false;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        return '<span class="badge' . $this->classes() . '">' .
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
            $classes .= ' ' . $this->style;
        }

        if ($this->pill === true) {
            $classes .= ' badge-pill';
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
