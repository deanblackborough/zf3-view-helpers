<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

use Zend\View\Helper\AbstractHelper;

/**
 * Generate a Bootstrap 4 card deck component
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4CardDeck extends AbstractHelper
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
     * @var array Cards
     */
    private $cards;

    /**
     * Entry point for the view helper
     *
     * @param string $width_class Optional card deck width class
     * @param string $width_attr Optional card deck width style attribute
     *
     * @return Bootstrap4CardDeck
     */
    public function __invoke(string $width_class = '', string $width_attr = ''): Bootstrap4CardDeck
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
        $this->cards = [];
    }

    /**
     * Fetch the assigned classes for the card deck div
     *
     * @return string
     */
    private function cardDeckClasses() : string
    {
        $class = 'card-deck';
        if ($this->width_class !== null) {
            $class .= ' ' . $this->width_class;
        }

        return $class;
    }

    /**
     * Fetch the assigned attributes for the card deck div
     *
     * @return null|string
     */
    private function cardDeckAttr() : string
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
        $html = '<div class="' . $this->cardDeckClasses() . '"';

        $attr = $this->cardDeckAttr();
        if ($attr !== null) {
            $html .= ' style="' . $attr . '"';
        }

        $html .= '>' . implode('', $this->cards) . '</div>';

        return $html;
    }

    /**
     * Add a card to the deck
     *
     * @param string $card
     *
     * @return Bootstrap4CardDeck
     */
    public function addCard(string $card) : Bootstrap4CardDeck
    {
        $this->cards[] = $card;

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
