#ZF3 view helpers

A bunch of view helpers that I use in my apps.

## Description

A collection of Zend Framework 2/3 view helpers, primarily focused on Bootstrap 3 and 4. 

### View helpers

* Bootstrap 3 Jumbotron
* Bootstrap 4 Jumbotron

## Installation

The easiest way to use the view helpers is with composer. ```composer require deanblackborough/zf3-view-helpers```, 
alternatively include the classes in src/ in your library.

## Usage

Add entries to the view_helper index in your module config, example below.
 
```
'view_helpers' => [
        'factories' => [
            Zf3ViewHelpers\Bootstrap4Jumbotron::class => InvokableFactory::class
        ],
        'aliases' => [
            'bootstrap4JumbotronHelper' => Zf3ViewHelpers\Bootstrap4Jumbotron::class
        ]
    ]
```
