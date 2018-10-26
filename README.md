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
- This version provides a **Bootstrap 4** components implementation with a **FontAwesome 5** pre-configuration.
- No implementation of **Bootstrap 3** has been done. Is someone is up to prepare views for this version, I would merge them in another version number.
- Components implementation is in progress : help is welcomed !

------------------------------------------------------------------------------------------------------------------------

## Components

### [Form](#form-components)
- [bsText()](#bstext)
- [bsTel()](#bstel)
- [bsDatetime()](#bsdatetime)
- [bsDate()](#bsdate)
- [bsTime()](#bstime)
- [bsUrl()](#bsurl)
- [bsEmail()](#bsemail)
- [bsPassword()](#bspassword)
- [bsFile()](#bsfileupload)
- [bsTextarea()](#bstextarea)
- [bsCheckbox()](#bscheckbox)
- [bsToggle()](#bstoggle)
- [bsRadio()](#bsradio)
- [bsSelect()](#bsselect)

### [Buttons](#buttons-components)
- [bsValidate()](#bsvalidate)
- [bsCreate()](#bscreate)
- [bsUpdate()](#bsupdate)
- [bsCancel()](#bscancel)
- [bsBack()](#bsback)

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
{{ bsText()->name('username') }}
```

------------------------------------------------------------------------------------------------------------------------

## Styles

If you use some extra components ([see API](#api)), you will have to load the package styles.  
For this, load the package `css` or `scss` file from the `[path/to/composer/vendor]/okipa/laravel-bootstrap-components/styles/scss` directory to your project.

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

**Methods available for all components**
  
| Signature | Required | Description |
|---|---|---|
| containerId(string $containerId): Component  | No |  |
| componentId(string $componentId): Component  | No |  |
| containerClass(array $containerClass): Component  | No | default value : `config('bootstrap-components.[component_config_key].class.container')`. |
| componentClass(array $componentClass): Component  | No | default value : `config('bootstrap-components.[component_config_key].class.component')`. |
| containerHtmlAttributes(array $containerHtmlAttributes): Component  | No | default value : `config('bootstrap-components.[component_config_key].html_attributes.container')`. |
| componentHtmlAttributes(array $componentHtmlAttributes): Component  | No | default value : `config('bootstrap-components.[component_config_key].html_attributes.component')`. |

### Form components

**Methods available for all form components**

| Signature | Required | Description |
|---|---|---|
|  name(string $name): Input  | Yes |  |
| model(Model $model): Input  | No |  |
| icon(string $icon): Input  | No | default value : `config('bootstrap-components.input.icon')`. |
| hideIcon(): Input  | No |  |
| label(string $label): Input  | No | default value : `trans('validation.attributes.[name]')`. |
| hideLabel(): Input  | No |  |
| placeholder(string $placeholder): Input  | No | default value : `$label`. |
| value($value): Input  | No | default value : `$model->{$name}`. |
| legend(string $legend): Input  | No | default value : `config('bootstrap-components.input.legend')`. |
| hideLegend(): Input  | No |  |
  
#### bsText()

```php
bsText()->name('name')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (text-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsTel()

```php
bsTel()->name('phone_number')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (tel-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsDatetime()

```php
bsDatetime()->name('published_at')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->format('Y-m-d') // override the default config format
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (datetime-local-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsDate()

```php
bsDate()->name('published_at')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->format('Y-m-d') // override the default config format
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (date-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsTime()

```php
bsTime()->name('published_at')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->format('H\h i\m\i\n') // override the default config format
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (date-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsUrl()

```php
bsUrl()->name('facebook_page')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (url-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsEmail()

```php
bsEmail()->name('email')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (email-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsPassword()

```php
bsPassword()->name('password')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (password-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsFile()

```php
bsFile()->name('avatar')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->uploadedFile(function(){
        return '<div>Some HTML</div>'
    })
    -showRemoveCheckbox() // override the default config show remove checkbox status
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (file-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| uploadedFile(Closure $uploadedFile): InputFile  | No | Allows to set html or another component to render the uploaded file. |
| showRemoveCheckbox(bool $showed = true): File  | No | Show the file remove checkbox (will appear only if an uploaded file is detected). Will send a `remove_[name]` value with the form data. Default value : `config('bootstrap-components.file.show_remove_checkbox')`. |

#### bsTextarea()

```php
bsTextarea()->name('message')
    ->model($user) // value is automatically detected from the field name
    ->value() // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (textarea-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsCheckbox()

```php
bsCheckbox()->name('active')
    ->model($user) // checked status is automatically detected from the field name
    ->checked(true) // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (checkbox-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| checked(bool $checked = true): Input  | No |  |

#### bsToggle()

```php
bsToggle()->name('active')
    ->model($user) // checked status is automatically detected from the field name
    ->checked(true) // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (toggle-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| checked(bool $checked = true): Input  | No |  |
  
_Notes :_
- This component is an extra component not included in bootstrap and using it demands to [load the package styles](#styles).
- The following class are applyable in the `containerClass()` method in order to manage the toggle size : `switch-sm` , `switch-lg`.

#### bsRadio()

```php
bsRadio()->name('gender')
    ->model($user) // checked status is automatically detected from the field name
    ->checked(true) // or manually set the value
    ->label('Name') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (radio-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| checked(bool $checked = true): Input  | No |  |
  
#### bsSelect()

```php
bsSelect()->name('selected')
    ->model($user) // selected option is automatically detected
    ->selected('id', 1) // or manually set the selected option
    ->options($usersList, 'id', 'name') // work with a models collection or an array
    ->multiple(false) // activate the multiple mode, default value = true
    ->label('Select a user') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->placeholder() // override the default placeholder (label)
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->legend('Select a user.') // override the default config legend
    ->hideLegend() // or hide the legend
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // override the default component id (select-[name])
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

**Notes : ** 
- in `single` mode, the selected() method second attribute only accept a string or an integer.
- in `multiple` mode, the selected() method second attribute only accept an array.

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| options(iterable $optionsList, string $optionValueField, string $optionLabelField): Select  | No | Set the options list (array or models collection) and declare which fields should be used for the options values and labels. |
| selected(string $fieldToCompare, $valueToCompare): Select  | No | Choose which option should be selected, declaring the field and the value to compare with the declared options list. |
| multiple(bool $multiple = true): Select  | No | Set the select multiple mode. |

### Buttons components

**Methods available for all buttons components**

| Signature | Required | Description |
|---|---|---|
| icon(string $icon): Input  | No | default value : `config('bootstrap-components.button.icon')`. |
| hideIcon(): Input  | No |  |
| label(string $label): Input  | No | default value : `config('bootstrap-components.button.label')`. |
| hideLabel(): Input  | No |  |

#### bsValidate()

```php
bsValidate()->label('Select a user') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsCreate()

```php
bsCreate()->label('Select a user') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsUpdate()

```php
bsUpdate()->label('Select a user') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### bsCancel()

```php
bsCancel()->url('https://www.google.com') // set the button url
    ->route('users.index') // or set the route name
    ->label('Select a user') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| url(string $url): Button  | No | default value : `url()->back()`. |
| route(string $route): Button  | No | set the url value from a route key. |

#### bsBack()

```php
bsBack()->url('https://www.google.com') // set the button url
    ->route('users.index') // or set the route name
    ->label('Select a user') // override the default trans('validation.attributes.[name]') label
    ->hideLabel() // or hide the label
    ->icon('<i class="fas fa-hand-pointer"></i>') // override the default config icon
    ->hideIcon() // or hide the icon
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| url(string $url): Button  | No | default value : `url()->back()`. |
| route(string $route): Button  | No | set the url value from a route key. |

### Media components
  
**Methods available for all form components**

| Signature | Required | Description |
|---|---|---|
| src(string $src): Media  | No |  |

#### image()

```php
image()->src(https://yourapp.fr/public/media/image-thumb.jpg)
    ->linkUrl(https://yourapp.fr/public/media/image-zoom.jpg)
    ->alt('Image')
    ->width(250)
    ->height(150)
    ->containerId('container-id') // set the container id
    ->linkId('link-id') // set the link id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->linkComponentClass(['link', 'component', 'class']) // override the default config link class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->linkHtmlAttributes(['link', 'component', 'class']) // override the default config link html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| linkUrl(string $linkUrl): Image  | No | Wrap the image in a link and set its url. |
| alt(string $alt): Image  | No |   |
| width(int $width): Image  | No |  |
| height(int $height): Image  | No |   |
| linkId(string $linkId): Image  | No |  |
| linkClass(array $linkClass): Image  | No | Default value : `config('bootstrap-components.media.image.class.link')`. |
| linkHtmlAttributes(array $linkHtmlAttributes): Image  | No | Default value : `config('bootstrap-components.media.image.html_attributes.link')`. |

#### audio()

```php
audio()->src(https://yourapp.fr/public/media/audio.mp3)
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

#### video()

```php
audio()->src(https://yourapp.fr/public/media/video.avi)
    ->poster(https://yourapp.fr/public/media/poster.jpg)
    ->containerId('container-id') // set the container id
    ->componentId('component-id') // set the component id
    ->containerClass(['container', 'class]) // override the default config container class list
    ->componentClass(['component', 'class']) // override the default config component class list
    ->containerHtmlAttributes(['container', 'html', 'attributes']) // override the default config container html attributes list
    ->componentHtmlAttributes(['component', 'html', 'attributes']) // override the default config component html attributes list
```

_Component additional methods :_

| Signature | Required | Description |
|---|---|---|
| poster(string $poster): Video | No | Default value : `config('bootstrap-components.media.video.poster')`. |

------------------------------------------------------------------------------------------------------------------------

## Testing

```bash
composer test
```

------------------------------------------------------------------------------------------------------------------------

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

------------------------------------------------------------------------------------------------------------------------

## Contributors

- [Okipa](https://github.com/Okipa)
- [ACID-Solutions](https://github.com/ACID-Solutions)
- [yepzy](https://github.com/yepzy)

------------------------------------------------------------------------------------------------------------------------

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
