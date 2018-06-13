# laravel-bootstrap-components

[![Source Code](https://img.shields.io/badge/source-okipa/laravel--bootstrap--components-blue.svg)](https://github.com/Okipa/laravel-bootstrap-components)
[![Latest Version](https://img.shields.io/github/release/okipa/laravel-bootstrap-components.svg?style=flat-square)](https://github.com/Okipa/laravel-bootstrap-components/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/okipa/laravel-bootstrap-components.svg?style=flat-square)](https://packagist.org/packages/okipa/laravel-bootstrap-components)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Build Status](https://scrutinizer-ci.com/g/Okipa/laravel-bootstrap-components/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-bootstrap-components/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/Okipa/laravel-bootstrap-components/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-bootstrap-components/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Okipa/laravel-bootstrap-components/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-bootstrap-components/?branch=master)

This package provides a ready-to-use and customizable bootstrap components library.  

**Notes :**
- This version provides a bootstrap 4 components implementation.
- No implementation of bootstrap 3 has been done. Is someone is up to prepare views versions for bootstrap 3, I would merge them in another version number.
- Components implementation is in progress : help is welcomed !

------------------------------------------------------------------------------------------------------------------------

## Components

### [Form](#form-components)
- [text()](#text)
- [tel()](#tel)
- [email()](#email)
- [password()](#password)
- [fileUpload()](#fileupload)
- [textarea()](#textarea)
- [toggle()](#toggle)

### [Clickable](#clickable-components)
- [buttonValidate()](#buttonvalidate)
- [buttonCreate()](#buttoncreate)
- [buttonUpdate()](#buttonupdate)
- [buttonCancel()](#buttoncancel)
- [buttonBack()](#buttonback)

### [Media](#media-components)
- [image()](#image)
- [audio()](#audio)
- [video()](#video)

------------------------------------------------------------------------------------------------------------------------

## Installation

- Install the package with composer :
```bash
composer require okipa/laravel-bootstrap-components
```

- Laravel 5.5+ uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.
If you don't use auto-discovery or if you use a Laravel 5.4- version, add the package service provider in the `register()` method from your `app/Providers/AppServiceProvider.php` :
```php
// laravel bootstrap components
// https://github.com/Okipa/laravel-bootstrap-components
$this->app->register(Okipa\LaravelBootstrapComponents\ComponentServiceProvider::class);
```

------------------------------------------------------------------------------------------------------------------------

## Usage

Just call the component you need in your view.

```
// example
{{ text()->name('username') }}
```

------------------------------------------------------------------------------------------------------------------------

## Styles

If you use some extra components ([see API](#api)), you will have to load the package styles.
For this, load the package `css` or `scss` file from the `[path/to/composer/vendor]/okipa/laravel-bootstrap-components/styles` directory to your project.

------------------------------------------------------------------------------------------------------------------------

## Configuration

Each component default view and default values, class and attributes can be configured.  
Publish the package configuration and override the available config values : 
```bash
php artisan vendor:publish --tag=bootstrap-components::config
```

------------------------------------------------------------------------------------------------------------------------

## Translations

To customize the existing translations, publish the packages translations files to make the wanted changes :
```
php artisan vendor:publish --tag=bootstrap-components::translations
```

------------------------------------------------------------------------------------------------------------------------

## Customization

Customize the used templates to make this package fit to your needs.  
Publish the views with the command :
```
php artisan vendor:publish --tag=bootstrap-components::views
```

------------------------------------------------------------------------------------------------------------------------

## API

Chainable methods available for all components :
- `public function containerClass(array $containerClass): Component` (optional)
  > default value : `config('bootstrap-components.[component_config_key].class.container')`
- `public function componentClass(array $componentClass): Component` (optional)
  > default value : `config('bootstrap-components.[component_config_key].class.component')`
- `public function containerHtmlAttributes(array $containerHtmlAttributes): Component` (optional)
  > default value : `config('bootstrap-components.[component_config_key].html_attributes.container')`
- `public function componentHtmlAttributes(array $componentHtmlAttributes): Component` (optional)
  > default value : `config('bootstrap-components.[component_config_key].html_attributes.component')`

### Form components

#### input()

Chainable methods :
- `public function type(string $type): Input` (required)
  > possible types : `text` / `tel` / `email` / `password` / `file`.
- `public function name(string $name): Input` (required)
- `public function model(Model $model): Input` (optional)
- `public function icon(string $icon): Input` (optional)
  > default value : `config('bootstrap-components.input.icon')`.
- `public function hideIcon(): Input` (optional)
- `public function label(string $label): Input` (optional)
  > default value : `trans('validation.attributes.[name]')`.
- `public function hideLabel(): Input` (optional)
- `public function placeholder(string $placeholder): Input` (optional)
  > default value : `$label`.
- `public function value($value): Input` (optional)
  > default value : `$model->{$name}`.
- `public function legend(string $legend): Input` (optional)
  > default value : `config('bootstrap-components.input.legend')`.
- `public function hideLegend(): Input` (optional)
  
#### text()

- Specific values :
  - type : `text`
- No specific chainable methods.

#### tel()

- Specific values :
  - type : `tel`
- No specific chainable methods.

#### email()

- Specific values :
  - type : `email`
- No specific chainable methods.

#### password()

- Specific values :
  - type : `password`
- No specific chainable methods.

#### fileUpload()

- Specific values :
  - type : `file`
- Extra chainable methods :
  - `public function uploadedFile(Closure $uploadedFile): InputFile` (optional)
  > allows to set html or another component to render the uploaded file.

#### textarea()

- Specific values :
  - type : `textarea`
- No specific chainable methods.

#### toggle()

- Specific values :
  - type : `toggle`
- No specific chainable methods.

**Note :** 
- this component is an extra component not included in bootstrap and using it demands to [load the package styles](#styles).

### Buttons components

- Chainable methods available for all button components :
  - `public function type(string $type): Input` (required)
  > possible types : `button` / `submit`.
  - `public function url(string $url): Button` (optional)
  > only used for a `type="button"` button component.
  > default value : `url()->back()`.
  - `public function route(string $route): Button` (optional)
  > only used for a `type="button"` button component.
  > set the url value from a route key.
  - `public function icon(string $icon): Input` (optional)
  > default value : `config('bootstrap-components.button.icon')`.
  - `public function hideIcon(): Input` (optional)
  - `public function label(string $label): Input` (optional)
  > default value : `config('bootstrap-components.button.label')`.
  - `public function hideLabel(): Input` (optional)

#### buttonValidate()

- Specific values :
  - type : `submit`
- No specific chainable methods.

#### buttonCreate()

- Specific values :
  - type : `submit`
- No specific chainable methods.

#### buttonUpdate()

- Specific values :
  - type : `submit`
- No specific chainable methods.

#### buttonCancel()

- Specific values :
  - type : `button`
- No specific chainable methods.

#### buttonBack()

- Specific values :
  - type : `button`
- No specific chainable methods.

### Media components
- Chainable methods available for all media components :
  - `public function src(string $src): Media` (optional)

#### image()
- Specific chainable methods :
  - `public function linkUrl(string $linkUrl): Image` (optional)
  > Wrap the image in a link and set its url.
  - `public function alt(string $alt): Image` (optional)
  - `public function width(int $width): Image` (optional)
  - `public function height(int $height): Image` (optional)
  - `public function linkClass(array $linkClass): Image` (optional)
  > gives the opportunity to set the image link wrapper class.
  > default value : `config('bootstrap-components.media.image.class.link')`.
  - `public function linkHtmlAttributes(array $linkHtmlAttributes): Image` (optional)
  > gives the opportunity to set the image link wrapper html attributes.
  > default value : `config('bootstrap-components.media.image.html_attributes.link')`.

#### audio()
No specific chainable methods.

#### video()
- Specific chainable methods :
  - `public function poster(string $poster): Video` (optional)
  > default value : `config('bootstrap-components.media.video.poster')`.

------------------------------------------------------------------------------------------------------------------------

## Contributors

- [ACID-Solutions](https://github.com/ACID-Solutions)
