<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 button
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Button extends AbstractHelper
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
        'primary', 'secondary', 'success', 'info', 'warning', 'danger', 'link'
    ];

    /**
     * @var boolean Add the large style
     */
    private $large;

    /**
     * @var boolean Add the small style
     */
    private $small;

    /**
     * @var boolean Add the block style
     */
    private $block;

    /**
     * @var boolean Add the active class
     */
    private $active;

    /**
     * Entry point for the view helper
     *
     * @param string $label
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function __invoke(string $label)
    {
        $this->reset();

        $this->label = $label;

        return $this;
    }

    /**
     * Set the style for the button, one of the following, primary, secondary, success,
     * info, warning, danger or link. If an incorrect style is passed in we set the style to
     * btn-primary
     *
     * @param string $style
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function setStyle(string $style)
    {
        if (in_array($style, $this->supported_styles) === true) {
            $this->style = $style;
        } else {
            $this->style = 'primary';
        }

        return $this;
    }

    /**
     * Size the button - large
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function large()
    {
        $this->large = true;

        return $this;
    }

    /**
     * Size the button - small
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function small()
    {
        $this->small = true;

        return $this;
    }

    /**
     * Block level button, add block class
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function block()
    {
        $this->block = true;

        return $this;
    }

    /**
     * Set the button as active
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function active()
    {
        $this->active = true;

        return $this;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset() : void
    {
        $this->label = null;
        $this->style = null;
        $this->large = false;
        $this->small = false;
        $this->block = false;
        $this->active = false;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render() : string
    {
        $html = '<a href="#" class="btn';

        if ($this->style != null) {
            $html .= ' btn-' . $this->style;
        }

        if ($this->large === true) {
            $html .= ' btn-lg';
        }

        if ($this->small === true) {
            $html .= ' btn-sm';
        }

        if ($this->block === true) {
            $html .= ' btn-block';
        }

        if ($this->active === true) {
            $html .= ' active';
        }

        $html .= '" role="button">' . $this->label . '</a>';

        return $html;
    }

    /**
     * Override the __toString() method to allow echo/print of the view helper directly, saves a
     * call to render()
     *
     * @return string
     */
    public function __toString() : string
    {
        return $this->render();
    }
}
