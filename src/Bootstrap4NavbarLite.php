<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 Navbar component, this is the lite version of the view
 * helper, there will be a full version which supports all the possible controls
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4NavbarLite extends Bootstrap4Helper
{
    /**
     * @var array Navbar content data array, populated by the add* methods
     */
    private $content;

    /**
     * @var string Selected color scheme
     */
    private $scheme;

    /**
     * @var string Brand label/name
     */
    private $brand_label;

    /**
     * @var string Brand uri
     */
    private $brand_uri;

    /**
     * Entry point for the view helper
     *
     * @return Bootstrap4NavbarLite
     */
    public function __invoke() : Bootstrap4NavbarLite
    {
        $this->reset();

        return $this;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset() : void
    {
        $this->content = [];

        $this->scheme = null;
        $this->brand_label = null;
        $this->brand_uri = null;
    }

    /**
     * Add a navigation item to the content array for the navbar
     *
     * @param array $navigation Navigation data array, array of menu items each with
     * active, uri and label indexes. If any of the indexes are missing the item is
     * ignored and a HTML comment is added to state an index is missing
     *
     * @return Bootstrap4NavbarLite
     */
    public function addNavigation(array $navigation) : Bootstrap4NavbarLite
    {
        $html = '<ul class="navbar-nav mr-auto">';

        foreach ($navigation as $nav) {
            if (array_key_exists('uri', $nav) === true &&
                array_key_exists('active', $nav) === true &&
                array_key_exists('label', $nav) === true) {

                $html .= '<li class="nav-item' . (($nav['active'] === true) ? ' active' : null) . '"><a class="nav-link" href="' .
                    $nav['uri'] . '">' . $nav['label'] . '</a></li>';
            } else {
                $html .= '<!-- Failed to add navigation item, index(es) missing -->';
            }
        }

        $html .= '</ul>';

        $this->content[] = $html;

        return $this;
    }

    /**
     * Use the light navbar color scheme (Default)
     *
     * @return Bootstrap4NavbarLite
     */
    public function lightScheme() : Bootstrap4NavbarLite
    {
        $this->scheme = 'navbar-light';

        return $this;
    }

    /**
     * Use the inverse scheme
     *
     * @return Bootstrap4NavbarLite
     */
    public function inverseScheme() : Bootstrap4NavbarLite
    {
        $this->scheme = 'navbar-inverse';

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4NavbarLite
     */
    public function setBgStyle(string $color) : Bootstrap4NavbarLite
    {
        $this->assignBgStyle($color);

        return $this;
    }

    /**
     * Set the text color for the component, need to be one of the following, primary, secondary, success, danger,
     * warning, info, light or dark, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4NavbarLite
     */
    public function setTextStyle(string $color) : Bootstrap4NavbarLite
    {
        $this->assignTextStyle($color);

        return $this;
    }

    /**
     * Set the brand label and an optional uri
     *
     * @param string $label
     * @param string $uri
     *
     * @return Bootstrap4NavbarLite
     */
    public function addBrand(string $label, string $uri = null) : Bootstrap4NavbarLite
    {
        $this->brand_label = $label;
        $this->brand_uri = $uri;

        return $this;
    }

    /**
     * Create the HTML for the brand
     *
     * @return string
     */
    private function brand() : string
    {
        if ($this->brand_label !== null) {
            if ($this->brand_uri === null) {
                return '<span class="h1 navbar-brand">' . $this->brand_label . '</span>';
            } else {
                return '<a class="navbar-brand" href="' .
                    $this->brand_uri . '">' . $this->brand_label . '</a>';
            }
        } return '';
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render() : string
    {
        if ($this->scheme !== null) {
            $class = ' ' . $this->scheme;
        } else {
            $class = ' navbar-light';
        }

        if ($this->bg_color !== null) {
            $class .= ' ' . $this->bg_color;
        } else {
            $class .= ' bg-light';
        }

        if ($this->text_color !== null) {
            $class .= ' ' . $this->text_color;
        }

        $html = '<nav class="navbar navbar-expand-lg' . $class . '" ' . $this->bg_color . '>' . $this->brand() .
            '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">' .
            '<span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarSupportedContent">';

        foreach ($this->content as $content) {
            $html .= $content;
        }

        $html .= '</div></nav>';

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
