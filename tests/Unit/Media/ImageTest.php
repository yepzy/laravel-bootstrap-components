<?php

namespace Okipa\LaravelBootstrapComponents\Test\Unit\Media;

use Okipa\LaravelBootstrapComponents\Media\Media;
use Okipa\LaravelBootstrapComponents\Test\BootstrapComponentsTestCase;

class ImageTest extends BootstrapComponentsTestCase
{
    public function testConfigStructure()
    {
        // components.media
        $this->assertTrue(array_key_exists('image', config('bootstrap-components.media')));
        // components.media.image
        $this->assertTrue(array_key_exists('view', config('bootstrap-components.media.image')));
        $this->assertTrue(array_key_exists('class', config('bootstrap-components.media.image')));
        $this->assertTrue(array_key_exists('html_attributes', config('bootstrap-components.media.image')));
        // components.image.class
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.media.image.class')));
        $this->assertTrue(array_key_exists('link', config('bootstrap-components.media.image.class')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.media.image.class')));
        // components.image.html_attributes
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.media.image.html_attributes')));
        $this->assertTrue(array_key_exists('link', config('bootstrap-components.media.image.html_attributes')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.media.image.html_attributes')));
    }

    public function testExtendsInput()
    {
        $this->assertEquals(Media::class, get_parent_class(image()));
    }

    public function testSetLinkUrl()
    {
        $customLinkUrl = 'test-custom-link-url';
        $html = image()->linkUrl($customLinkUrl)->toHtml();
        $this->assertContains('href="' . $customLinkUrl . '"', $html);
    }

    public function testNoLinkUrl()
    {
        $html = image()->toHtml();
        $this->assertNotContains('href="', $html);
    }

    public function testSetSrc()
    {
        $customSrc = 'test-custom-src';
        $html = image()->src($customSrc)->toHtml();
        $this->assertContains('src="' . $customSrc . '"', $html);
    }

    public function testNoSrc()
    {
        $html = image()->toHtml();
        $this->assertNotContains('src="', $html);
    }

    public function testSetAlt()
    {
        $customAlt = 'test-custom-alt';
        $html = image()->alt($customAlt)->toHtml();
        $this->assertContains('alt="' . $customAlt . '"', $html);
    }

    public function testNoAlt()
    {
        $html = image()->toHtml();
        $this->assertNotContains('alt="', $html);
    }

    public function testSetWidth()
    {
        $customWidth = 100;
        $html = image()->width($customWidth)->toHtml();
        $this->assertContains('width="' . $customWidth . '"', $html);
    }

    public function testNoWidth()
    {
        $html = image()->toHtml();
        $this->assertNotContains('width="', $html);
    }

    public function testSetHeight()
    {
        $customHeight = 100;
        $html = image()->height($customHeight)->toHtml();
        $this->assertContains('height="' . $customHeight . '"', $html);
    }

    public function testNoHeight()
    {
        $html = image()->toHtml();
        $this->assertNotContains('height="', $html);
    }

    public function testConfigContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        config()->set('bootstrap-components.media.image.class.container', [$configContainerCLass]);
        $html = image()->toHtml();
        $this->assertContains('class="image-container ' . $configContainerCLass . '"', $html);
    }

    public function testSetContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        $customContainerCLass = 'test-custom-class-container';
        config()->set('bootstrap-components.input.class.container', [$configContainerCLass]);
        $html = image()->containerClass([$customContainerCLass])->toHtml();
        $this->assertContains('class="image-container ' . $customContainerCLass . '"', $html);
        $this->assertNotContains('class="image-container ' . $configContainerCLass . '"', $html);
    }

    public function testConfigLinkClass()
    {
        $configLinkCLass = 'test-config-class-link';
        config()->set('bootstrap-components.media.image.class.link', [$configLinkCLass]);
        $html = image()->toHtml();
        $this->assertContains('class="image-link ' . $configLinkCLass . '"', $html);
    }

    public function testSetLinkClass()
    {
        $configLinkCLass = 'test-config-class-link';
        $customLinkCLass = 'test-custom-class-link';
        config()->set('bootstrap-components.media.image.class.link', [$configLinkCLass]);
        $html = image()->linkClass([$customLinkCLass])->toHtml();
        $this->assertContains('class="image-link ' . $customLinkCLass . '"', $html);
        $this->assertNotContains('class="image-link ' . $configLinkCLass . '"', $html);
    }

    public function testSetNoContainerId()
    {
        $html = image()->toHtml();
        $this->assertNotContains('<div id="', $html);
    }

    public function testSetContainerId()
    {
        $customContainerId = 'test-custom-container-id';
        $html = image()->containerId($customContainerId)->toHtml();
        $this->assertContains('<div id="' . $customContainerId, $html);
    }

    public function testSetNoLinkId()
    {
        $html = image()->toHtml();
        $this->assertNotContains('<a id="', $html);
    }

    public function testSetLinkId()
    {
        $customContainerId = 'test-custom-link-id';
        $html = image()->linkId($customContainerId)->toHtml();
        $this->assertContains('<a id="' . $customContainerId, $html);
    }

    public function testSetNoComponentId()
    {
        $html = image()->toHtml();
        $this->assertNotContains('<img id="', $html);
    }

    public function testSetComponentId()
    {
        $customComponentId = 'test-custom-component-id';
        $html = image()->componentId($customComponentId)->toHtml();
        $this->assertContains('<img id="' . $customComponentId . '"', $html);
    }

    public function testConfigComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        config()->set('bootstrap-components.media.image.class.component', [$configComponentCLass]);
        $html = image()->toHtml();
        $this->assertContains('class="image-component ' . $configComponentCLass . '"', $html);
    }

    public function testSetComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        $customComponentCLass = 'test-custom-class-component';
        config()->set('bootstrap-components.media.image.class.component', [$customComponentCLass]);
        $html = image()->componentClass([$customComponentCLass])->toHtml();
        $this->assertContains('class="image-component ' . $customComponentCLass . '"', $html);
        $this->assertNotContains('class="image-component ' . $configComponentCLass . '"', $html);
    }

    public function testConfigContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        config()->set('bootstrap-components.media.image.html_attributes.container', [$configContainerAttributes]);
        $html = image()->toHtml();
        $this->assertContains($configContainerAttributes, $html);
    }

    public function testSetContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        $customContainerAttributes = 'test-custom-attributes-container';
        config()->set('bootstrap-components.media.image.html_attributes.container', [$configContainerAttributes]);
        $html = image()->containerHtmlAttributes([$customContainerAttributes])->toHtml();
        $this->assertContains($customContainerAttributes, $html);
        $this->assertNotContains($configContainerAttributes, $html);
    }

    public function testConfigLinkHtmlAttributes()
    {
        $configLinkAttributes = 'test-config-attributes-link';
        config()->set('bootstrap-components.media.image.html_attributes.link', [$configLinkAttributes]);
        $html = image()->toHtml();
        $this->assertContains($configLinkAttributes, $html);
    }

    public function testSetLinkHtmlAttributes()
    {
        $configLinkAttributes = 'test-config-attributes-link';
        $customLinkAttributes = 'test-custom-attributes-link';
        config()->set('bootstrap-components.media.image.html_attributes.link', [$configLinkAttributes]);
        $html = image()->linkHtmlAttributes([$customLinkAttributes])->toHtml();
        $this->assertContains($customLinkAttributes, $html);
        $this->assertNotContains($configLinkAttributes, $html);
    }
    
    public function testConfigComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        config()->set('bootstrap-components.media.image.html_attributes.component', [$configComponentAttributes]);
        $html = image()->toHtml();
        $this->assertContains($configComponentAttributes, $html);
    }

    public function testSetComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        $customComponentAttributes = 'test-custom-attributes-component';
        config()->set('bootstrap-components.media.image.html_attributes.component', [$configComponentAttributes]);
        $html = image()->componentHtmlAttributes([$customComponentAttributes])->toHtml();
        $this->assertContains($customComponentAttributes, $html);
        $this->assertNotContains($configComponentAttributes, $html);
    }
}
