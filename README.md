#ZF3 view helpers

A bunch of view helpers that I use in my apps.

## Description

A collection of Zend Framework 2/3 view helpers, primarily focused on Bootstrap 3 and 4.
 
* Bootstrap 3 Jumbotron component
* Bootstrap 4 Jumbotron component

### The view helpers

#### Bootstrap 3 Jumbotron

Create a Bootstrap 3 jumbotron, heading and content can be set and optionally a sub heading and 
whether or not the jumbotron is fluid.

##### Public methods:
 
* fluid() - Add the jumbotron-fluid class
* subHeading() - Add an optional sub heading, small tag inside the H1

##### Example

``` 
echo $this->bootstrap3JumbotronHelper($heading, $content)->
    subHeading($sub_heading)->
    fluid();
```

#### Bootstrap 4 Jumbotron

Create a Bootstrap 4 jumbotron, heading and content can be set and optionally the display level class 
for the heading, a sub heading or whether or not the fluid class applied.

##### Public methods:
 
* headingDisplayLevel(integer[1-4]) - Set the display level class for the heading
* fluid() - Add the jumbotron-fluid class
* subHeading() - Add an optional sub heading, small tag inside the H1

##### Example

``` 
echo $this->bootstrap4JumbotronHelper($heading, $content)->
    subHeading($sub_heading)->
    fluid()->
    headingDisplayLevel(1);
```

## Installation

The easiest way to use the view helpers is with composer. ```composer require deanblackborough/zf3-view-helpers```, 
alternatively include the classes in src/ in your library.

## Usage

Add entries to the view_helper index in your module config array, example below.
 
```
'view_helpers' => [
        'factories' => [
            Zf3ViewHelpers\Bootstrap3Jumbotron::class => InvokableFactory::class,
            Zf3ViewHelpers\Bootstrap4Jumbotron::class => InvokableFactory::class
        ],
        'aliases' => [
            'bootstrap3JumbotronHelper' => Zf3ViewHelpers\Bootstrap3Jumbotron::class,
            'bootstrap4JumbotronHelper' => Zf3ViewHelpers\Bootstrap4Jumbotron::class
        ]
    ]
```
