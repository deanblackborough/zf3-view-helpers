[![Latest Stable Version](https://img.shields.io/packagist/v/deanblackborough/zf3-view-helpers.svg?style=flat-square)](https://packagist.org/packages/deanblackborough/zf3-view-helpers)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/deanblackborough/zf3-view-helpers/blob/master/LICENSE)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)](https://php.net/)

# ZF3 view helpers

A bunch of view helpers that I use in my apps.

## Description

A collection of Zend Framework 3 view helpers, primarily focused on Bootstrap 3 and 4.
 
* Bootstrap 3 Badge component
* Bootstrap 4 Badge component
* Bootstrap 3 Button component
* Bootstrap 4 Button component
* Bootstrap 3 Jumbotron component
* Bootstrap 4 Jumbotron component
* Bootstrap 3 Label component
* Bootstrap 4 Navbar component (lite)
* Bootstrap 4 progress bar component
* Bootstrap 4 multiple progress bar component

## Code completion

This package requires my sister package https://github.com/deanblackborough/zf3-view-helpers-code-completion 
which can be used to provide code completion for all the view helpers as well as the default Zend 
 view helpers.
 
Override $this in your views.

```/** @var $this DBlackborough\Zf3ViewHelpersCC\CustomAndZend */```

## The view helpers

Below is an overview of the more complex view helpers.

### Bootstrap 3 Jumbotron

Create a Bootstrap 3 jumbotron, heading and content can be set and optionally a sub heading and 
whether or not the jumbotron is fluid.

##### Public methods:
 
* fluid() - Add the jumbotron-fluid class
* subHeading() - Add an optional sub heading, small tag inside the H1

##### Example

``` 
echo $this->bootstrap3Jumbotron($heading, $content)->
    subHeading($sub_heading)->
    fluid();
```

### Bootstrap 4 Jumbotron

Create a Bootstrap 4 jumbotron, heading and content can be set and optionally the display level class 
for the heading, a sub heading or whether or not the fluid class applied.

##### Public methods:
 
* headingDisplayLevel(integer[1-4]) - Set the display level class for the heading
* fluid() - Add the jumbotron-fluid class
* subHeading() - Add an optional sub heading, small tag inside the H1

##### Example

``` 
echo $this->bootstrap4Jumbotron($heading, $content)->
    subHeading($sub_heading)->
    fluid()->
    headingDisplayLevel(1);
```

### Bootstrap 3 Button

Create a Bootstrap 3 button

##### Public methods:
 
* active() - Set button as active
* block() - Add display block style
* disabled() - Set button as disabled
* large() - Add large class
* link() - Add URI/URL for default button type
* setModeButton - Render as a button, not an anchor
* setModeInput - Render as an input, not an anchor
* setStyle() - Set btn-* style
* small() - Add small class
* customClass - Add a custom class
* extraSmall - Add extra small class

##### Example

``` 
echo $this->bootstrap3Button($label)->
    setStyle('primary')->
    block()->
    large()->
    link($uri);
```

### Bootstrap 4 Button

Create a Bootstrap 4 button

##### Public methods:
 
* active() - Set button as active
* block() - Add display block style
* disabled() - Set button as disabled
* large() - Add large class
* link() - Add URI/URL for default button type
* setModeButton() - Render as a button, not an anchor
* setModeInput() - Render as an input, not an anchor
* setOutlineStyle() - Set btn-outline-* style
* setStyle() - Set btn-* style
* small() - Add small class
* customClass() - Add a custom class

##### Example

``` 
echo $this->bootstrap4Button($label)->
    setStyle('primary')->
    block()->
    large()->
    link($uri);
```

### Bootstrap 4 Navbar (lite version)

Create a navbar component

##### Public methods 

* addBrand() - Add a brand an option uri
* addNavigation() - Pass in a navigation array
* bgColor() - Set a custom background color for the navbar
* bgStyle() - Set a class for the navbar
* inverseScheme() - Add the navbar-inverse style
* lightScheme() - Add the navbar-light style

#### Example

```
echo $this->bootstrap4NavbarLite()->
    addBrand('Dlayer')->
    bgStyle('bg-faded')->
    addNavigation([ ['uri' => '#', 'label' => 'Item 1', 'active' => false ] ]); ?>
```

### Bootstrap 4 progress bar

Create a progress bar

##### Public methods 

* animate() - Animate the striped background style
* color() - Set the background color for the progress bar
* height() - Set the height of the progress bar
* label() - Set the label for the progress bar
* striped() - Enable the striped style for the progress bar background

#### Example

```
echo $this->bootstrap4ProgressBar(25)->
    color('info')->
    striped()->
    animate(); ?>
```

### Bootstrap 4 multiple progress bar

Create a progress bar with multiple bars

##### Public methods 

* animate() - Animate the striped background style
* colors() - Set the background colors for the progress bar
* height() - Set the height of the progress bar
* label() - Set the label for the progress bar
* striped() - Enable the striped style for the progress bar background

#### Example

```
echo $this->bootstrap4ProgressBar([25, 15])->
    colors(['info', 'warning'])->
    striped()->
    animate(); ?>
```

## Installation

The easiest way to use the view helpers is with composer. ```composer require deanblackborough/zf3-view-helpers```, 
alternatively include the classes in src/ in your library.

## Usage

Add entries to the view_helper index in your module config array, the examples below 
adds the Jumbotron and Button view helpers, repeat for all the view helpers you would like 
to use in your project.
 
```
'view_helpers' => [
        'factories' => [
            Zf3ViewHelpers\Bootstrap3Jumbotron::class => InvokableFactory::class,
            Zf3ViewHelpers\Bootstrap4Jumbotron::class => InvokableFactory::class,
            Zf3ViewHelpers\Bootstrap3Button::class => InvokableFactory::class,
            Zf3ViewHelpers\Bootstrap4Button::class => InvokableFactory::class
        ],
        'aliases' => [
            'bootstrap3Jumbotron' => Zf3ViewHelpers\Bootstrap3Jumbotron::class,
            'bootstrap4Jumbotron' => Zf3ViewHelpers\Bootstrap4Jumbotron::class,
            'bootstrap3Button' => Zf3ViewHelpers\Bootstrap4Button::class,
            'bootstrap4Button' => Zf3ViewHelpers\Bootstrap4Button::class
        ]
    ]
```
