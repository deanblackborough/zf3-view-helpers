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
     * @var array Assigned classes
     */
    private $classes;

    /**
     * @var array Assigned attributes
     */
    private $attr;

    /**
     * @var string Body content
     */
    private $body;

    /**
     * @var array Body content items
     */
    private $body_sections;

    /**
     * @var string Header content
     */
    private $header;

    /**
     * @var string Footer content
     */
    private $footer;

    /**
     * @var array Elements on card
     */
    private $elements = ['card', 'body', 'header', 'footer'];

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
            $this->classes['card'][] = $width_class;
        }

        if (strlen($width_attr) > 0) {
            $this->attr['card'][] = $width_attr;
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
        $this->classes = ['card' => [], 'body' => [], 'header' => [], 'footer' => []];
        $this->attr = ['card' => [], 'body' => [], 'header' => [], 'footer' => []];

        $this->body = null;
        $this->body_sections = [];
        $this->header = null;
        $this->footer = null;
    }

    /**
     * Fetch the assigned classes for the card div
     *
     * @return string
     */
    private function cardClasses() : string
    {
        $class = 'card';

        if (count($this->classes['card']) > 0) {
            $class .= ' ' . implode(' ', $this->classes['card']);
        }

        return $class;
    }

    /**
     * Fetch the assigned attributes for the card div
     *
     * @return string
     */
    private function cardAttr() : string
    {
        return implode(' ', $this->attr['card']);
    }

    /**
     * Generate the card body, checks to see if any section have been defined first, if not, check
     * for a complete body
     *
     * @return string
     */
    private function cardBody() : string
    {
        if (count($this->body_sections) === 0) {
            if ($this->body !== null) {
                $body = $this->body;
            } else {
                $body = '<p>No card body content defined, no calls to setBody() or setBodyContent().</p>';
            }
        } else {
            $body = implode('', $this->body_sections);
        }

        return '<div class="card-body">' . $body . '</div>';
    }

    /**
     * Generate the card header
     *
     * @return string
     */
    private function cardHeader() : string
    {
        if ($this->header !== null) {
            return '<div class="card-header">' . $this->header . '</div>';
        }
    }

    /**
     * Generate the card footer
     *
     * @return string
     */
    private function cardFooter() : string
    {
        if ($this->footer !== null) {
            return '<div class="card-footer">' . $this->footer . '</div>';
        }
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        $html = '<div class="' . $this->cardClasses() . '"';

        $attr = $this->cardAttr();
        if (strlen($attr) !== 0) {
            $html .= ' style="' . $attr . '"';
        }

        $html .= '>' . $this->cardHeader() . $this->cardBody() .
            $this->cardFooter() . '</div>';

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
        if (in_array($element, $this->elements) === true) {
            $this->classes[$element][] = $class;
        }

        return $this;
    }

    /**
     * Set a custom attribute for an element
     *
     * @param string $attr Attribute to assign to element
     * @param string $element Element to attach the attribute to [card|body|header|footer]
     *
     * @return Bootstrap4Card
     */
    public function setCustomAttr(string $attr, string $element) : Bootstrap4Card
    {
        if (in_array($element, $this->elements) === true) {
            $this->attr[$element][] = $attr;
        }

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
        $this->body = $content;

        return $this;
    }

    /**
     * Set body content for the card body, alternative to setBody, allows you to define body
     * sections, relevant sections are created for you
     *
     * @param string $content
     * @param string $type [title|subtitle|text|link]
     * @param array $options Options for the content type
     *
     * @return Bootstrap4Card
     */
    public function setBodyContent(string $content, string $type, array $options = []) : Bootstrap4Card
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
        $this->header = $content;

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
        $this->footer = $content;

        return $this;
    }

    /**
     * Set optional image
     *
     * @return Bootstrap4Card
     */
    public function setImage() : Bootstrap4Card
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
