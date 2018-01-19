<?php
declare(strict_types=1);

namespace DBlackborough\Zf3ViewHelpers;

/**
 * Generate a Bootstrap 4 column, responsive classes set via method chaining
 *
 * @package DBlackborough\Zf3ViewHelpers
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough
 * @license https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE
 */
class Bootstrap4Column extends Bootstrap4Helper
{
    /**
     * @var string Row content
     */
    private $content;

    /**
     * @var integer LG column size
     */
    private $lg_size = null;

    /**
     * @var integer MD column size
     */
    private $md_size = null;

    /**
     * @var integer SM column size
     */
    private $sm_size = null;

    /**
     * @var integer XL column size
     */
    private $xl_size = null;

    /**
     * @var integer XS column size
     */
    private $xs_size = null;

    /**
     * Entry point for the view helper
     *
     * @param string $content Row content
     *
     * @return Bootstrap4Column
     */
    public function __invoke(string $content): Bootstrap4Column
    {
        $this->reset();

        $this->content = $content;

        return $this;
    }

    /**
     * Large 'lg' column
     *
     * @param integer $size Number of lg columns, a value between 1 and 12
     *
     * @return Bootstrap4Column
     */
    public function lg(int $size): Bootstrap4Column
    {
        $this->lg_size = $size;

        return $this;
    }

    /**
     * Medium 'md' column
     *
     * @param integer $size Number of md columns, a value between 1 and 12
     *
     * @return Bootstrap4Column
     */
    public function md(int $size): Bootstrap4Column
    {
        $this->md_size = $size;

        return $this;
    }

    /**
     * Set the background colour for the component, needs to be one of the following, primary, secondary, success,
     * danger, warning, info, light, dark or white, if an incorrect style is passed in we don't apply the class.
     *
     * @param string $color
     *
     * @return Bootstrap4Column
     */
    public function setBgStyle(string $color) : Bootstrap4Column
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
     * @return Bootstrap4Column
     */
    public function setTextStyle(string $color) : Bootstrap4Column
    {
        $this->assignTextStyle($color);

        return $this;
    }

    /**
     * Small 'sm' column
     *
     * @param integer $size Number of sm columns, a value between 1 and 12
     *
     * @return Bootstrap4Column
     */
    public function sm(int $size): Bootstrap4Column
    {
        $this->sm_size = $size;

        return $this;
    }

    /**
     * Extra large 'xl' column
     *
     * @param integer $size Number of xl columns, a value between 1 and 12
     *
     * @return Bootstrap4Column
     */
    public function xl(int $size): Bootstrap4Column
    {
        $this->xl_size = $size;

        return $this;
    }

    /**
     * Extra small column
     *
     * @param integer $size Number of xs columns, a value between 1 and 12
     *
     * @return Bootstrap4Column
     */
    public function xs(int $size): Bootstrap4Column
    {
        $this->xs_size = $size;

        return $this;
    }

    /**
     * Generate the classes string for the row
     *
     * @return string
     */
    private function classes() : string
    {
        $classes = 'row';

        if ($this->bg_color !== null) {
            $classes .= ' bg-' . $this->bg_color;
        }

        if ($this->text_color !== null) {
            $classes .= ' text-' . $this->text_color;
        }

        if ($this->lg_size !== null) {
            $classes .= ' col-lg-' . $this->lg_size;
        }

        if ($this->md_size !== null) {
            $classes .= ' col-md-' . $this->md_size;
        }

        if ($this->sm_size !== null) {
            $classes .= ' col-sm-' . $this->sm_size;
        }

        if ($this->xl_size !== null) {
            $classes .= ' col-xl-' . $this->xl_size;
        }

        if ($this->xs_size !== null) {
            $classes .= ' col-' . $this->xs_size;
        }

        return $classes;
    }

    /**
     * Worker method for the view helper, generates the HTML, the method is private so that we
     * can echo/print the view helper directly
     *
     * @return string
     */
    protected function render(): string
    {
        $html = '<div class="' . $this->classes() . '">' .
            $this->content .
            '</div>';

        return $html;
    }

    /**
     * Reset all properties in case the view helper is called multiple times within a script
     *
     * @return void
     */
    private function reset(): void
    {
        $this->content = null;
        $this->lg_size = null;
        $this->md_size = null;
        $this->sm_size = null;
        $this->xl_size = null;
        $this->xs_size = null;
    }
}
