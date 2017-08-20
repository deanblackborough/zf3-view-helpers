<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 card component
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Card extends AbstractHelper
{
    /**
     * @var string Width class
     */
    private $width_class;

    /**
     * @var string Width style attribute
     */
    private $width_attr;

    /**
     * Entry point for the view helper
     *
     * @param string $width_class Optional card width class
     * @param string $width_attr Optional card width style attribute
     *
     * @return Bootstrap4Card
     */
    public function __invoke(string $width_class = '', string $width_attr = ''): Bootstrap4Card
    {
        $this->reset();

        if (strlen($width_class) > 0) {
            $this->width_class = $width_class;
        }

        if (strlen($width_attr) > 0) {
            $this->width_attr = $width_attr;
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
        $this->width_class = null;
        $this->width_attr = null;
    }

    /**
     * Fetch the assigned classes for the card div
     *
     * @return string
     */
    private function card_classes() : string
    {
        $class = 'card';
        if ($this->width_class !== null) {
            $class .= ' ' . $this->width_class;
        }

        return $class;
    }

    /**
     * Fetch the assigned attributes for the card div
     *
     * @return null|string
     */
    private function card_attr() : string
    {
        $attr = null;

        if ($this->width_attr !== null) {
            $attr .= $this->width_attr;
        }

        return $attr;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        $html = '<div class="' . $this->card_classes() . '"';

        $attr = $this->card_attr();
        if ($attr !== null) {
            $html .= ' style="' . $attr . '"';
        }

        $html .= '>' . '' . '</div>';

        return $html;
    }

    /**
     * Set a custom class for an element
     *
     * @param string $class Class to assign to element
     * @param string $element Element to attach the class to [card|body|header|footer]
     *
     * @return Bootstrap4Card
     */
    public function setCustomClass(string $class, string $element) : Bootstrap4Card
    {
        // Not yet implemented

        return $this;
    }

    /**
     * Set a custom attribute for an element
     *
     * @param string $class Class to assign to element
     * @param string $element Element to attach the attribute to [card|body|header|footer]
     *
     * @return Bootstrap4Card
     */
    public function setCustomAttr(string $class, string $element) : Bootstrap4Card
    {
        // Not yet implemented

        return $this;
    }

    /**
     * Set the body content for the card
     *
     * @param string $content
     *
     * @return Bootstrap4Card
     */
    public function setBody(string $content) : Bootstrap4Card
    {
        // Not yet implemented

        return $this;
    }

    /**
     * Set optional header content for card
     *
     * @param string $content
     *
     * @return Bootstrap4Card
     */
    public function setHeader(string $content) : Bootstrap4Card
    {
        // Not yet implemented

        return $this;
    }

    /**
     * Set optional footer content for card
     *
     * @param string $content
     *
     * @return Bootstrap4Card
     */
    public function setFooter(string $content) : Bootstrap4Card
    {
        // Not yet implemented
        
        return $this;
    }

    /**
     * Override the __toString() method to allow echo/print to call on the view helper, saves a
     * call to render()
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
