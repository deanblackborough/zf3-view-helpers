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
abstract class Bootstrap4Helper extends AbstractHelper
{
    /**
     * @var array Bootstrap styles
     */
    protected $supported_bg_styles = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'white'
    ];

    /**
     * @var array Bootstrap styles
     */
    protected $supported_text_styles = [
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
     * @var string Assign an alternate background colour for the component
     */
    protected $bg_color;

    /**
     * @var string Assign an alternate text colour for the component
     */
    protected $text_color;

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

    /**
     * Validate and assign the background colour, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     */
    protected function assignBgStyle(string $color)
    {
        if (in_array($color, $this->supported_bg_styles) === true) {
            $this->bg_color = $color;
        }
    }

    /**
     * Validate and assign the text colour, need to be one of the following, primary, secondary, success, danger,
     * warning, info, light or dark, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     */
    protected function assignTextStyle(string $color)
    {
        if (in_array($color, $this->supported_text_styles) === true) {
            $this->text_color = $color;
        }
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is protected, called by __toString when
     * echo or print are called on the view helper
     *
     * @return string
     */
    protected function render() : string
    {
        return $this->__toString();
    }
}
