<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 button, defaults to creating an 'a' tag, use the 'set mode to' methods
 * to switch to button or input
 *
 * @todo Set mode to button
 * @todo Set mode to input
 * @todo Add outline styles
 * @todo Add disabled state
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
     * @var string Link URI/URL
     */
    private $link;

    /**
     * @var string Render mode, wither link, button or input, defaults to link
     */
    private $mode;

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
     * Set the link for the button, only usable when in the default mode, anchor tag, ignored
     * in button and input mode
     *
     * @param string $link
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function link($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Switch to button mode, instead of generating an anchor tag the viuew helper will generate a
     * button
     *
     * @return \DBlackborough\Zf3ViewHelpers\Bootstrap4Button
     */
    public function setModeButton()
    {
        $this->mode = 'button';

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
        $this->link = null;
        $this->mode = 'link';
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
        $html .= $this->classes();
        $html .= '" role="button">' . $this->label . '</a>';

        return $html;
    }

    /**
     * Generate the classes for the button based on the options set
     *
     * @return string
     */
    private function classes() : string
    {
        $classes = '';

        if ($this->style != null) {
            $classes .= ' btn-' . $this->style;
        }

        if ($this->large === true) {
            $classes .= ' btn-lg';
        }

        if ($this->small === true) {
            $classes .= ' btn-sm';
        }

        if ($this->block === true) {
            $classes .= ' btn-block';
        }

        if ($this->active === true) {
            $classes .= ' active';
        }

        return $classes;
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
