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
     * @param string $class Option card class, for example width
     * @param string $attr Optional card style attribute, for example width
     *
     * @return Bootstrap4Card
     */
    public function __invoke(string $class = '', string $attr = ''): Bootstrap4Card
    {
        $this->reset();

        if (strlen($class) > 0) {
            $this->classes['card'][] = $class;
        }

        if (strlen($attr) > 0) {
            $this->attr['card'][] = $attr;
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
     * Fetch the classes assigned to the given element
     *
     * @param string $element [card|body|header|footer]
     *
     * @return string
     */
    private function elementClasses(string $element) : string
    {
        if (in_array($element, $this->elements) === true) {
            $class = '';

            if (count($this->classes[$element]) > 0) {
                $class = ' ' . implode(' ', $this->classes[$element]);
            }

            return $class;
        } else {
            return '';
        }
    }

    /**
     * Fetch the attributes assigned to the given element
     *
     * @param string $element [card|body|header|footer]
     *
     * @return string
     */
    private function elementAttr(string $element) : string
    {
        if (in_array($element, $this->elements) === true) {
            $attr = '';

            if (count($this->attr[$element]) > 0) {
                $attr = ' style="' . implode(' ', $this->attr[$element]) . '"';
            }

            return $attr;
        } else {
            return '';
        }
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

        return '<div class="card-body' . $this->elementClasses('body') . '"' .
            $this->elementAttr('body') . '>' . $body . '</div>';
    }

    /**
     * Generate the card header
     *
     * @return string
     */
    private function cardHeader() : string
    {
        $html = '';

        if ($this->header !== null) {
            $html .= '<div class="card-header' . $this->elementAttr('header') .
                '"' . $this->elementAttr('header') . '>' . $this->header . '</div>';
        }

        return $html;
    }

    /**
     * Generate the card footer
     *
     * @return string
     */
    private function cardFooter() : string
    {
        $html = '';

        if ($this->header !== null) {
            $html .= '<div class="card-footer' . $this->elementAttr('footer') .
                '"' . $this->elementAttr('header') . '>' . $this->footer . '</div>';
        }

        return $html;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    private function render(): string
    {
        $html = '<div class="card' . $this->elementClasses('card') . '"' .
            $this->elementAttr('card') . '>' .
            $this->cardHeader() . $this->cardBody() .
            $this->cardFooter() . '</div>';

        return $html;
    }

    /**
     * Add a custom class to a card element
     *
     * @param string $class Class to assign to element
     * @param string $element Element to attach the class to [card|body|header|footer]
     *
     * @return Bootstrap4Card
     */
    public function addCustomClass(string $class, string $element) : Bootstrap4Card
    {
        if (in_array($element, $this->elements) === true) {
            $this->classes[$element][] = $class;
        }

        return $this;
    }

    /**
     * Add a custom attribute to a card element
     *
     * @param string $attr Attribute to assign to element
     * @param string $element Element to attach the attribute to [card|body|header|footer]
     *
     * @return Bootstrap4Card
     */
    public function addCustomAttr(string $attr, string $element) : Bootstrap4Card
    {
        if (in_array($element, $this->elements) === true) {
            $this->attr[$element][] = $attr;
        }

        return $this;
    }

    /**
     * Set the entire body content for the card, alternative to defining the body content
     * in parts
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
     * Add a text section to the body
     *
     * @param string $content
     *
     * @return Bootstrap4Card
     */
    public function addTextToBody(string $content) : Bootstrap4Card
    {
        $this->body_sections[] = '<div class="card-text">' . $content . '</div>';

        return $this;
    }

    /**
     * Add a title section to the body
     *
     * @param string $content
     * @param string $tag title tag, defaults to h4
     *
     * @return Bootstrap4Card
     */
    public function addTitleToBody(string $content, string $tag = 'h4') : Bootstrap4Card
    {
        $this->body_sections[] = '<' . $tag . ' class="card-title">' . $content . '</' . $tag . '>';

        return $this;
    }

    /**
     * Add a subtitle section to the body
     *
     * @param string $content
     * @param string $tag title tag, defaults to h6
     *
     * @return Bootstrap4Card
     */
    public function addSubtitleToBody(string $content, string $tag = 'h6') : Bootstrap4Card
    {
        $this->body_sections[] = '<' . $tag . ' class="card-subtitle">' . $content . '</' . $tag . '>';

        return $this;
    }

    /**
     * Add a link section to the body
     *
     * @param string $content
     * @param string $uri URI
     *
     * @return Bootstrap4Card
     */
    public function addLinkToBody(string $content, string $uri) : Bootstrap4Card
    {
        $this->body_sections[] = '<a href="' . $uri . '">' . $content . '</a>';

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
