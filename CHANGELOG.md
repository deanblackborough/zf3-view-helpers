# Changelog

Full changelog for Zend Framework 3 view helpers library.

## v1.02.2 - Code coverage - 2018-05-16

* Added code coverage reporting.
* Updated dependencies and tested.

## v1.02.1 - Dependency - 2018-01-20

* Removed deanblackborough/zf3-view-helpers-code-completion from require, added to suggest

## v1.02.0 - Row and Column view helper - 2018-01-20

* Added a Bootstrap 4 row view helper.
* Added a Bootstrap 4 column view helper.
* Updated dependencies, zendframework/zend-view v2.10

## v1.01.2 - Minor corrections - 2018-01-05

* Require PHP 7, suggest PHP 7.2.
* Removed unused property.
* Testing against PHP7.2.
* Updated dependencies.
* Spelling corrections.

## v1.01.1 - Minor corrections - 2017-12-04

* Type hints missing.
* Unused property.

## v1.01.0 - Alert component - 2017-12-02

* Added a Bootstrap 4 alert view helper.
* Removed a redundant property in the button view helper.
* Type hints missing.
* Added missing dates in CHANGELOG.

## v1.00.0 - Card component (Official release) - 2017-10-13

Official v1.00.0 release, tests in place for all the Bootstrap 4 view helpers.

* Card view helper extends Bootstrap4Helper.
* Card view helper supports setTextStyle() and setBgStyle().
* Added tests for card view helper.
* setFooter() in card view helper broken, incorrect property being used to generated HTML.
* Fixed a couple of bugs with the navbar view helper.
* Added tests for the navbar view helper.

## v0.66.0 - Minor updates - 2017-10-11

* Updated Bootstrap 4 jumbotron view helper, extends Bootstrap4Helper.
* Updated Bootstrap 4 multiple progress bar view helper, extends Bootstrap4Helper.
* Updated Bootstrap 4 badge view helper, extends Bootstrap4Helper.
* Updated Bootstrap 4 button view helper, extends Bootstrap4Helper.
* Added combined tests to view helpers.
* Corrected README.

## v0.65.0 - Base class - 2017-10-11

* Additional tests for Bootstrap 4 Progress bar view helper.
* Added a base class for Bootstrap 4 view helpers, Progress bar now extends it for base functionality.
* Minor changes to method names.

## v0.64.0 - Tests and Jumbotron - 2017-10-11

* Added tests for Bootstrap 4 Jumbotron view helper.
* Added setBGStyle() and setTextStyle() to Jumbotron view helper.
* Jumbotron headings default to heading-1 for the H1.
* Added tests for Bootstrap 4 Progress bar view helper.
* Bootstrap 4 progress bar view helper now supports all the bg-* utility classes.

## v0.63.0 - Tests - 2017-10-08

* Removing call to default escape plugins, assumption now is developer will escape their own data.
* Added tests for Bootstrap 4 Badge view helper.
* Added tests for Bootstrap 4 Button view helper.

## v0.62.1 - Beta 4.0.0 updates/fixes

* Badge view helper updated, classes match beta-4.0.0 of Bootstrap.
* Updated supported styles for badge and button view helpers.

## v0.62.0 - Cards: First body element only

* Updated addCustomBodyAttr() and addCustomBodyClass(), only apply custom class or attribute to the first body element 
of the given type.

## v0.61.1 - Navbar view helper

* Updated navbar view helper to take account of changes between the alpha and beta.
* Updated the background schemes.

## v0.61 - Card view helper: Custom body attributes and classes - 2017-08-25

* Custom attributes and classes can be assigned to body section.
* Comment corrections/updates.

## v0.60 - Card - 2017-08-22

* Added a Bootstrap 4 card view helper.
* Updated README, changed order of sections.

## v0.51 - Progress bar - 2017-08-14

* Added Bootstrap 3 progress bar view helper.
* Switched back to require, if you use the view helpers you need the completion, you don't need the completion to develop the view helpers.

## v0.50 - Progress bar - 2017-07-26

* Added progress bar and multiple progress bar Bootstrap 4 view helpers.

## v0.40.3 - Readme - 2017-05-30

* Updated readme with details on code completion package.

## v0.40.2 - Dependency - 2017-05-30

* Code completion package is now a dependency.

## v0.40.2 - Dependency - 2017-05-30

* Code completion package is now a dependency.

## v0.40.1 - Escape - 2017-05-26

* View helpers were not calling the escape helpers.

## v0.40 - Navbar - 2017-05-24

* Added a Bootstrap 4 navbar view helper.

## v0.30 - Badges and labels - 2017-05-22

* Added Bootstrap 3 badge view helper.
* Added Bootstrap 3 label view helper.
* Added Bootstrap 4 badge view helper.
* Minor fixes.

## v0.25 - Buttons - 2017-05-22

* Added Bootstrap 3 button view helper.
* customClass method was incorrectly private.

## v0.20 - Buttons - 2017-05-19

* Added Bootstrap 4 button view helper.

## v0.10.1 - Icons - 2017-05-16

* Added missing icons to README.

## v0.10 (Initial release) - 2017-05-16

* Added Bootstrap 3 Jumbotron view helper.
* Added Bootstrap 4 Jumbotron view helper.
