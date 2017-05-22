<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 3 button, defaults to creating an 'a' tag, use the 'set mode to' methods
 * to switch to button or input
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap3Button extends AbstractHelper
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
        'primary',
        'secondary',
        'success',
        'info',
        'warning',
        'danger',
        'link'
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
     * @var boolean Add the extra small style
     */
    private $extra_small;

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
     * @var boolean Add disabled option
     */
    private $disabled;

    /**
     * @var string Render mode, wither link, button or input, defaults to link
     */
    private $mode;

    /**
     * @var string Input type if setModeInput called
     */
    private $input_type;

    /**
     * @var array Custom classes
     */
    private $custom_classes;

    /**
     * Entry point for the view helper
     *
     * @param string $label
     *
     * @return Bootstrap3Button
     */
    public function __invoke(string $label): Bootstrap3Button
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
     * @return Bootstrap3Button
     */
    public function setStyle(string $style): Bootstrap3Button
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
     * @return Bootstrap3Button
     */
    public function large(): Bootstrap3Button
    {
        $this->large = true;

        return $this;
    }

    /**
     * Size the button - small
     *
     * @return Bootstrap3Button
     */
    public function small(): Bootstrap3Button
    {
        $this->small = true;

        return $this;
    }

    /**
     * Size the button - extra small
     *
     * @return Bootstrap3Button
     */
    public function extraSmall(): Bootstrap3Button
    {
        $this->extra_small = true;

        return $this;
    }

    /**
     * Block level button, add block class
     *
     * @return Bootstrap3Button
     */
    public function block(): Bootstrap3Button
    {
        $this->block = true;

        return $this;
    }

    /**
     * Set the button as active
     *
     * @return Bootstrap3Button
     */
    public function active(): Bootstrap3Button
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
     * @return Bootstrap3Button
     */
    public function link($link): Bootstrap3Button
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Set the disabled option
     *
     * @return Bootstrap3Button
     */
    public function disabled(): Bootstrap3Button
    {
        $this->disabled = true;

        return $this;
    }

    /**
     * Switch to button mode, instead of generating an anchor tag the view helper will generate a
     * button
     *
     * @return Bootstrap3Button
     */
    public function setModeButton(): Bootstrap3Button
    {
        $this->mode = 'button';

        return $this;
    }

    /**
     * Switch to input mode, instead of generating an anchor tag the view helper will generate an
     * input of the requested type
     *
     * @param string $type Input type, button, submit or reset, defaults to button if invalid type
     *
     * @return Bootstrap3Button
     */
    public function setModeInput($type): Bootstrap3Button
    {
        $this->mode = 'input';
        if (in_array($type, array('button', 'submit', 'reset')) === true) {
            $this->input_type = $type;
        } else {
            $this->input_type = 'button';
        }

        return $this;
    }

    /**
     * Add a custom class
     *
     * @param string $class
     *
     * @return Bootstrap3Button
     */
    public function customClass($class): Bootstrap3Button
    {
        $this->custom_classes[] = $class;
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
        $this->large = false;
        $this->small = false;
        $this->extra_small = false;
        $this->block = false;
        $this->active = false;
        $this->link = null;
        $this->disabled = false;
        $this->mode = 'link';
        $this->input_type = null;
        $this->custom_classes = [];
    }

    /**
     * Worker method for the view helper, generates the HTML, the method id private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        switch ($this->mode) {
            case 'button':
                $html = '<button class="btn' . $this->classes() . '" type="submit" ' .
                    (($this->disabled === true) ? 'disabled ' : null) .
                    '>' . $this->label . '</button>';
                break;

            case 'input':
                $html = '<input class="btn' . $this->classes() . '" type="' .
                    $this->input_type . '" value="' . $this->label . '" ' .
                    (($this->disabled === true) ? ' disabled ' : null) . '/>';
                break;

            default:
                $html = '<a href="' . (($this->link !== null) ? $this->link : '#') .
                    '" class="btn' . $this->classes() .
                    (($this->disabled === true) ? ' disabled' : null) .
                    '" role="button">' . $this->label . '</a>';
                break;
        }

        return $html;
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
            $classes .= ' btn-' . $this->style;
        }

        if ($this->large === true) {
            $classes .= ' btn-lg';
        }

        if ($this->small === true) {
            $classes .= ' btn-sm';
        }

        if ($this->extra_small === true) {
            $classes .= ' btn-xs';
        }

        if ($this->block === true) {
            $classes .= ' btn-block';
        }

        if ($this->active === true) {
            $classes .= ' active';
        }

        if (count($this->custom_classes) > 0) {
            $classes .= ' ' . implode(' ', $this->custom_classes);
        }

        return $classes;
    }

    /**
     * Override the __toString() method to allow echo/print of the view helper directly, saves a
     * call to render()
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
