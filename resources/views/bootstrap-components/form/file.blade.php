<div {{ htmlAttributes($containerId ? ['id' => $containerId] : null) }}
    {{ classTag($type . '-' . str_slug($name) . '-container', $containerClass) }}
    {{ htmlAttributes($containerHtmlAttributes) }}>
    @include('bootstrap-components::bootstrap-components.partials.label')
    @if($uploadedFileHtml->toHtml())
        {{ $uploadedFileHtml }}
        @if($showRemoveCheckbox){{ bsCheckbox()->name('remove_' . $name )
            ->label($removeCheckboxLabel)
            ->containerClass(['mb-1']) }}@endif
    @endif
    <div class="input-group">
        @include('bootstrap-components::bootstrap-components.partials.icon')
        <div class="custom-file">
            <input id="{{ $componentId }}"
                   type="file"
                   name="{{ $name }}"
                   {{ classTag('custom-file-input', 'form-control', $type . '-' . str_slug($name) . '-component', $componentClass, validationStatus($name, isset($showSuccessFeedback) ? $showSuccessFeedback : true)) }}
                   lang="{{ app()->getLocale() }}"
                   {{ htmlAttributes($componentHtmlAttributes) }}
                   aria-label="{{ $label }}"
                   aria-describedby="file-{{ str_slug($name) }}">
            <label class="custom-file-label" for="{{ $componentId }}">@empty($value = old($name, $value)){{ $placeholder }}@else{{ $value }}@endempty</label>
        </div>
    </div>
    @include('bootstrap-components::bootstrap-components.partials.validation-feedback')
    @include('bootstrap-components::bootstrap-components.partials.legend')
</div>
