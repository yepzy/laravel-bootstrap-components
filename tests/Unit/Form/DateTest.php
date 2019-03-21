<?php

namespace Okipa\LaravelBootstrapComponents\Tests\Unit\Form;

use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Okipa\LaravelBootstrapComponents\Form\Input;
use Okipa\LaravelBootstrapComponents\Test\BootstrapComponentsTestCase;
use Okipa\LaravelBootstrapComponents\Test\Fakers\UsersFaker;

class DateTest extends BootstrapComponentsTestCase
{
    use UsersFaker;

    public function testConfigStructure()
    {
        // components.form
        $this->assertTrue(array_key_exists('date', config('bootstrap-components.form')));
        // components.form.date
        $this->assertTrue(array_key_exists('view', config('bootstrap-components.form.date')));
        $this->assertTrue(array_key_exists('icon', config('bootstrap-components.form.date')));
        $this->assertTrue(array_key_exists('format', config('bootstrap-components.form.date')));
        $this->assertTrue(array_key_exists('legend', config('bootstrap-components.form.date')));
        $this->assertTrue(array_key_exists('class', config('bootstrap-components.form.date')));
        $this->assertTrue(array_key_exists('html_attributes', config('bootstrap-components.form.date')));
        // components.form.date.class
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.form.date.class')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.form.date.class')));
        // components.form.date.html_attributes
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.form.date.html_attributes')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.form.date.html_attributes')));
    }

    public function testExtendsInput()
    {
        $this->assertEquals(Input::class, get_parent_class(bsDate()));
    }

    public function testSetName()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('name="name"', $html);
    }

    public function testType()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('type="date"', $html);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Okipa\LaravelBootstrapComponents\Form\Date : Missing $name property. Please use the
     *                           name() method to set a name.
     */
    public function testInputWithoutName()
    {
        bsDate()->toHtml();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Okipa\LaravelBootstrapComponents\Form\Date : the value must be a valid DateTime object
     *                           or formatted string, « test-custom-name » given.
     */
    public function testWrongModelValue()
    {
        $user = $this->createUniqueUser();
        $user->name = 'test-custom-name';
        bsDate()->model($user)->name('name')->toHtml();
    }

    public function testModelDateTimeObjectValue()
    {
        $user = $this->createUniqueUser();
        $user->published_at = $this->faker->dateTime;
        $html = bsDate()->model($user)->name('published_at')->toHtml();
        $this->assertContains(
            'value="' . $user->published_at->format(config('bootstrap-components.form.date.format')) . '"',
            $html
        );
    }

    public function testModelDateTimeStringValue()
    {
        $user = $this->createUniqueUser();
        $user->published_at = $this->faker->dateTime->format('Y-m-d');
        $html = bsDate()->model($user)->name('published_at')->toHtml();
        $this->assertContains(
            'value="' . Carbon::parse($user->published_at)->format(config('bootstrap-components.form.date.format'))
            . '"',
            $html
        );
    }

    public function testSetConfigFormat()
    {
        $configFormat = 'Y-m-d H:i:s';
        config()->set('bootstrap-components.form.date.format', $configFormat);
        $user = $this->createUniqueUser();
        $user->published_at = $this->faker->dateTime;
        $html = bsDate()->model($user)->name('published_at')->toHtml();
        $this->assertContains($user->published_at->format($configFormat), $html);
    }

    public function testSetFormat()
    {
        $configFormat = 'Y-m-d H:i:s';
        $customFormat = 'Y-m-d H:i';
        config()->set('bootstrap-components.form.date.format', $configFormat);
        $user = $this->createUniqueUser();
        $user->published_at = $this->faker->dateTime;
        $html = bsDate()->model($user)->name('published_at')->format($customFormat)->toHtml();
        $this->assertContains($user->published_at->format($customFormat), $html);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Okipa\LaravelBootstrapComponents\Form\Date : No config or custom format is given for
     *                           the bsDate() component.
     */
    public function testNoFormat()
    {
        config()->set('bootstrap-components.form.date.format', null);
        $user = $this->createUniqueUser();
        $user->published_at = $this->faker->dateTime;
        bsDate()->model($user)->name('published_at')->toHtml();
    }

    public function testConfigIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.form.date.icon', $configIcon);
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('<span class="icon input-group-text">' . $configIcon . '</span>', $html);
    }

    public function testSetIcon()
    {
        $configIcon = 'test-config-icon';
        $customIcon = 'test-custom-icon';
        config()->set('bootstrap-components.form.date.icon', $configIcon);
        $html = bsDate()->name('name')->icon($customIcon)->toHtml();
        $this->assertContains('<span class="icon input-group-text">' . $customIcon . '</span>', $html);
        $this->assertNotContains('<span class="icon input-group-text">' . $configIcon . '</span>', $html);
    }

    public function testNoIcon()
    {
        config()->set('bootstrap-components.form.date.icon', null);
        $html = bsDate()->name('name')->toHtml();
        $this->assertNotContains('<span class="icon input-group-text">', $html);
    }

    public function testHideIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.form.date.icon', $configIcon);
        $html = bsDate()->name('name')->hideIcon()->toHtml();
        $this->assertNotContains('<span class="icon input-group-text">' . $configIcon . '</span>', $html);
    }

    public function testConfigLegend()
    {
        $configLegend = 'test-config-legend';
        config()->set('bootstrap-components.form.date.legend', $configLegend);
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains(
            '<small id="date-name-legend" class="form-text text-muted">bootstrap-components::' . $configLegend
            . '</small>',
            $html
        );
    }

    public function testSetLegend()
    {
        $configLegend = 'test-config-legend';
        $customLegend = 'test-custom-legend';
        config()->set('bootstrap-components.form.date.legend', $configLegend);
        $html = bsDate()->name('name')->legend($customLegend)->toHtml();
        $this->assertContains(
            '<small id="date-name-legend" class="form-text text-muted">' . $customLegend
            . '</small>',
            $html
        );
        $this->assertNotContains(
            '<small id="date-name-legend" class="form-text text-muted">bootstrap-components::' . $configLegend
            . '</small>',
            $html
        );
    }

    public function testNoLegend()
    {
        config()->set('bootstrap-components.form.date.legend', null);
        $html = bsDate()->name('name')->toHtml();
        $this->assertNotContains('<small id="date-name-legend" class="form-text text-muted">', $html);
    }

    public function testHideLegend()
    {
        $configLegend = 'test-config-legend';
        config()->set('bootstrap-components.form.date.legend', $configLegend);
        $html = bsDate()->name('name')->hideLegend()->toHtml();
        $this->assertNotContains('<small id="date-name-legend" class="form-text text-muted">', $html);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Okipa\LaravelBootstrapComponents\Form\Date : the value must be a valid DateTime object
     *                           or formatted string, « test-custom-value » given.
     */
    public function testSetWrongValue()
    {
        $customValue = 'test-custom-value';
        $html = bsDate()->name('name')->value($customValue)->toHtml();
        $this->assertContains('value="' . $customValue . '"', $html);
    }

    public function testSetValue()
    {
        $customValue = $this->faker->dateTime;
        $html = bsDate()->name('name')->value($customValue)->toHtml();
        $this->assertContains(
            'value="' . $customValue->format(config('bootstrap-components.form.date.format')) . '"',
            $html
        );
    }

    public function testOldValue()
    {
        $oldValue = $this->faker->dateTime->format('Y-m-d');
        $customValue = $this->faker->dateTime->format('Y-m-d');
        $this->app['router']->get('test', [
            'middleware' => 'web', 'uses' => function () use ($oldValue) {
                $request = request()->merge(['name' => $oldValue]);
                $request->flash();
            },
        ]);
        $this->call('GET', 'test');
        $html = bsDate()->name('name')->value($customValue)->toHtml();
        $this->assertContains('value="' . $oldValue . '"', $html);
        $this->assertNotContains('value="' . $customValue . '"', $html);
    }

    public function testSetLabel()
    {
        $label = 'test-custom-label';
        $html = bsDate()->name('name')->label($label)->toHtml();
        $this->assertContains('<label for="date-name">' . $label . '</label>', $html);
        $this->assertContains('placeholder="' . $label . '"', $html);
        $this->assertContains('aria-label="' . $label . '"', $html);
    }

    public function testNoLabel()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('<label for="date-name">validation.attributes.name</label>', $html);
        $this->assertContains('aria-label="validation.attributes.name"', $html);
    }

    public function testHideLabel()
    {
        $html = bsDate()->name('name')->hideLabel()->toHtml();
        $this->assertNotContains('<label for="date-name">validation.attributes.name</label>', $html);
        $this->assertNotContains('aria-label="validation.attributes.name"', $html);
    }

    public function testSetPlaceholder()
    {
        $placeholder = 'test-custom-placeholder';
        $html = bsDate()->name('name')->placeholder($placeholder)->toHtml();
        $this->assertContains('placeholder="' . $placeholder . '"', $html);
    }

    public function testSetPlaceholderWithLabel()
    {
        $label = 'test-custom-label';
        $placeholder = 'test-custom-placeholder';
        $html = bsDate()->name('name')->label($label)->placeholder($placeholder)->toHtml();
        $this->assertContains('placeholder="' . $placeholder . '"', $html);
    }

    public function testNoPlaceholder()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('placeholder="validation.attributes.name"', $html);
    }

    public function testHidePlaceholder()
    {
        $html = bsDate()->name('name')->hidePlaceholder()->toHtml();
        $this->assertNotContains('placeholder="validation.attributes.name"', $html);
    }

    public function testSuccess()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        $html = bsDate()->name('name')->render(['errors' => $messageBag]);
        $this->assertContains('<div class="valid-feedback d-block">', $html);
        $this->assertContains(
            trans('bootstrap-components::bootstrap-components.notification.validation.success'),
            $html
        );
    }

    public function testNoSuccess()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertNotContains('<div class="valid-feedback d-block">', $html);
    }

    public function testError()
    {
        $errorMessage = 'This a test error message';
        $messageBag = app(MessageBag::class)->add('name', $errorMessage);
        $html = bsDate()->name('name')->render(['errors' => $messageBag]);
        $this->assertContains('<div class="invalid-feedback d-block">', $html);
        $this->assertContains($errorMessage, $html);
    }

    public function testNoError()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertNotContains('<div class="invalid-feedback d-block">', $html);
    }

    public function testSetNoContainerId()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertNotContains('<div id="', $html);
    }

    public function testSetContainerId()
    {
        $customContainerId = 'test-custom-container-id';
        $html = bsDate()->name('name')->containerId($customContainerId)->toHtml();
        $this->assertContains('<div id="' . $customContainerId . '"', $html);
    }

    public function testSetNoComponentId()
    {
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('for="date-name"', $html);
        $this->assertContains('<input id="date-name"', $html);
    }

    public function testSetComponentId()
    {
        $customComponentId = 'test-custom-component-id';
        $html = bsDate()->name('name')->componentId($customComponentId)->toHtml();
        $this->assertContains('for="' . $customComponentId . '"', $html);
        $this->assertContains('<input id="' . $customComponentId . '"', $html);
    }

    public function testConfigContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        config()->set('bootstrap-components.form.date.class.container', [$configContainerCLass]);
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains('class="date-name-container ' . $configContainerCLass . '"', $html);
    }

    public function testSetContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        $customContainerCLass = 'test-custom-class-container';
        config()->set('bootstrap-components.form.date.class.container', [$configContainerCLass]);
        $html = bsDate()->name('name')->containerClass([$customContainerCLass])->toHtml();
        $this->assertContains('class="date-name-container ' . $customContainerCLass . '"', $html);
        $this->assertNotContains('class="date-name-container ' . $configContainerCLass . '"', $html);
    }

    public function testConfigComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        config()->set('bootstrap-components.form.date.class.component', [$configComponentCLass]);
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains(
            'class="form-control date-name-component ' . $configComponentCLass . '"',
            $html
        );
    }

    public function testSetComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        $customComponentCLass = 'test-custom-class-component';
        config()->set('bootstrap-components.form.date.class.component', [$customComponentCLass]);
        $html = bsDate()->name('name')->componentClass([$customComponentCLass])->toHtml();
        $this->assertContains(
            'class="form-control date-name-component ' . $customComponentCLass . '"',
            $html
        );
        $this->assertNotContains(
            'class="form-control date-name-component ' . $configComponentCLass . '"',
            $html
        );
    }

    public function testConfigContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        config()->set('bootstrap-components.form.date.html_attributes.container', [$configContainerAttributes]);
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains($configContainerAttributes, $html);
    }

    public function testSetContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        $customContainerAttributes = 'test-custom-attributes-container';
        config()->set('bootstrap-components.form.date.html_attributes.container', [$configContainerAttributes]);
        $html = bsDate()->name('name')->containerHtmlAttributes([$customContainerAttributes])->toHtml();
        $this->assertContains($customContainerAttributes, $html);
        $this->assertNotContains($configContainerAttributes, $html);
    }

    public function testConfigComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        config()->set('bootstrap-components.form.date.html_attributes.component', [$configComponentAttributes]);
        $html = bsDate()->name('name')->toHtml();
        $this->assertContains($configComponentAttributes, $html);
    }

    public function testSetComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        $customComponentAttributes = 'test-custom-attributes-component';
        config()->set('bootstrap-components.form.date.html_attributes.component', [$configComponentAttributes]);
        $html = bsDate()->name('name')->componentHtmlAttributes([$customComponentAttributes])->toHtml();
        $this->assertContains($customComponentAttributes, $html);
        $this->assertNotContains($configComponentAttributes, $html);
    }

    public function testConfigShowSuccessFeedback()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        config()->set('bootstrap-components.global.input.show_success_feedback', true);
        $html = bsDate()->name('name')->render(['errors' => $messageBag]);
        $this->assertContains('<div class="valid-feedback d-block">', $html);
    }

    public function testConfigHideSuccessFeedback()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        config()->set('bootstrap-components.global.input.show_success_feedback', false);
        $html = bsDate()->name('name')->render(['errors' => $messageBag]);
        $this->assertNotContains('<div class="valid-feedback d-block">', $html);
    }

    public function testSetShowSuccessFeedback()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        $html = bsDate()->name('name')->showSuccessFeedback()->render(['errors' => $messageBag]);
        $this->assertContains('<div class="valid-feedback d-block">', $html);
    }

    public function testSetHideSuccessFeedback()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        $html = bsDate()->name('name')->hideSuccessFeedback()->render(['errors' => $messageBag]);
        $this->assertNotContains('<div class="valid-feedback d-block">', $html);
    }
}
