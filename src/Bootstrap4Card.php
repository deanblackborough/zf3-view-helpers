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
     * @var array Assigned body classes
     */
    private $body_classes;

    /**
     * @var array Assigned body attributes
     */
    private $body_attr;

    /**
     * @var array Body classes which should only be assigned to first body element of given type
     */
    private $body_classes_first;

    /**
     * @var array Body attributes which should only be assigned to first body element of given type
     */
    private $body_attr_first;

    /**
     * @var string Body content
     */
    private $body;

    /**
     * @var array Body content sections, generated HTML
     */
    private $body_sections;

    /**
     * @var array Body content items, indexed by type
     */

    /**
     * @var string Header content
     */
    private $header;

    /**
     * @var string Footer content
     */
    private $footer;

    /**
     * @var array Elements of card
     */
    private $elements = ['card', 'body', 'header', 'footer'];

    /**
     * @var array Elements of card body
     */
    private $body_elements = ['title', 'subtitle', 'text', 'link'];

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

        $this->body_classes = ['title' => [], 'subtitle' => [], 'text' => [], 'link' => []];
        $this->body_attr = ['title' => [], 'subtitle' => [], 'text' => [], 'link' => []];

        $this->body_classes_first = [];
        $this->body_attr_first = [];

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
     * Fetch the classes assigned to the given body element type
     *
     * @param string $element [title|subtitle|text|link]
     *
     * @return string
     */
    private function elementBodyClasses(string $element) : string
    {
        if (in_array($element, $this->body_elements) === true) {
            $class = '';

            if (count($this->body_classes[$element]) > 0) {
                if (array_key_exists($element, $this->body_classes_first) === false) {
                    $class = ' ' . implode(' ', $this->body_classes[$element]);
                } else {
                    $class = '';
                    foreach ($this->body_classes[$element] as $body_class) {
                        if (array_key_exists($body_class, $this->body_classes_first[$element]) === false) {
                            $class .= ' ' . $body_class;
                        } else {
                            if ($this->body_classes_first[$element][$body_class] === true) {
                                $class .= ' ' . $body_class;
                                $this->body_classes_first[$element][$body_class] = false;
                            }
                        }
                    }
                }
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
     * Fetch the attributes assigned to the given body element type
     *
     * @param string $element [title|subtitle|text|link]
     *
     * @return string
     */
    private function elementBodyAttr(string $element) : string
    {
        if (in_array($element, $this->body_elements) === true) {
            $attr = '';

            if (count($this->body_attr[$element]) > 0) {
                if (array_key_exists($element, $this->body_attr_first) === false) {
                    $attr = ' style="' . implode(' ', $this->body_attr[$element]) . '"';
                } else {
                    $attr = ' style="';
                    foreach ($this->body_attr[$element] as $body_attr) {
                        if (array_key_exists($body_attr, $this->body_attr_first[$element]) === false) {
                            $attr .= ' ' . $body_attr . ';';
                        } else {
                            if ($this->body_attr_first[$element][$body_attr] === true) {
                                $attr .= ' ' . $body_attr . ';';
                                $this->body_attr_first[$element][$body_attr] = false;
                            }
                        }
                    }
                    $attr .= '"';
                }
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
            $body = $this->cardBodyHtml();
        }

        return '<div class="card-body' . $this->elementClasses('body') . '"' .
            $this->elementAttr('body') . '>' . $body . '</div>';
    }

    /**
     * Generate and return the body content HTML by looping through the set body sections
     *
     * @return string
     */
    private function cardBodyHtml() : string
    {
        $html = '';

        foreach ($this->body_sections as $section) {
            switch ($section['type']) {
                case 'title':
                    $html .= '<' . $section['tag'] . ' class="card-title' .
                        $this->elementBodyClasses('title') . '"' .
                        $this->elementBodyAttr('title')  . '>' . $section['content'] .
                        '</' . $section['tag'] . '>';
                    break;

                case 'subtitle':
                    $html .= '<' . $section['tag'] . ' class="card-subtitle' .
                        $this->elementBodyClasses('subtitle') . '"' .
                        $this->elementBodyAttr('subtitle') . '>' .
                        $section['content'] . '</' . $section['tag'] . '>';
                    break;

                case 'text':
                    $html .= '<div class="card-text' . $this->elementBodyClasses('text') . '"' .
                        $this->elementBodyAttr('text') . '>' . $section['content'] . '</div>';
                    break;

                case 'link':
                    $html .= '<a href="' . $section['uri'] . '" class="' .
                        $this->elementBodyClasses('link') . '"' .
                        $this->elementBodyAttr('link') . '>' . $section['content'] . '</a>';
                    break;

                default:
                    // Do nothing
                    break;
            }
        }

        return $html;
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
     * Silently errors, if the element is invalid the attribute is not assigned to the classes array
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
     * Add a custom class to a card body element, if there are multiple body elements of
     * the same type the class will be added to all of them.
     *
     * Silently errors, if the element is invalid the attribute is not assigned to the body classes array
     *
     * @param string $class Class to assign to element
     * @param string $element Body element to attach the class to [title|subtitle|text|link]
     * @param boolean $first Only apply the class to the first body element of the given type rather than all elements
     *
     * @return Bootstrap4Card
     */
    public function addCustomBodyClass(string $class, string $element, bool $first = false) : Bootstrap4Card
    {
        if (in_array($element, $this->body_elements) === true) {
            $this->body_classes[$element][] = $class;

            if ($first === true) {
                $this->body_classes_first[$element][$class] = true;
            }
        }

        return $this;
    }

    /**
     * Add a custom attribute to a card element
     *
     * Silently errors, if the element is invalid the attribute is not assigned to the attributes array
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
     * Add a custom attribute to a card body element, if there are multiple body elements of
     * the same type the attribute will be added to all of them.
     *
     * Silently errors, if the element is invalid the attribute is not assigned to the body attributes array
     *
     * @param string $attr Attribute to assign to element
     * @param string $element Body element to attach the attribute to [title|subtitle|text|link]
     * @param boolean $first Only apply the attribute to the first body element of the given type rather than all elements
     *
     * @return Bootstrap4Card
     */
    public function addCustomBodyAttr(string $attr, string $element, bool $first = false) : Bootstrap4Card
    {
        if (in_array($element, $this->body_elements) === true) {
            $this->body_attr[$element][] = $attr;

            if ($first === true) {
                $this->body_attr_first[$element][$attr] = true;
            }
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
        $this->body_sections[] = [
            'type' => 'text',
            'content' => $content
        ];

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
        $this->body_sections[] = [
            'type' => 'title',
            'tag' => $tag,
            'content' => $content
        ];

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
        $this->body_sections[] = [
            'type' => 'subtitle',
            'tag' => $tag,
            'content' => $content
        ];

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
        $this->body_sections[] = [
            'type' => 'link',
            'uri' => $uri,
            'content' => $content
        ];

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
