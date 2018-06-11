<div {{ classTag('input-' . $name . '-container', $containerClass) }}
    {{ htmlAttributes($containerHtmlAttributes) }}>
    @include('bootstrap-components::components.partials.label')
    <div class="input-group">
        @include('bootstrap-components::components.partials.icon')
        <input id="input-{{ $name }}"
               {{ classTag('form-control', 'input-' . $name . '-component', $componentClass, isset($errors) && $errors->has($name) ? ' is-invalid' : null) }}
               type="{{ $type }}"
               name="{{ $name }}"
               value="{{ old($name, $value) }}"
               placeholder="{{ $placeholder }}"
               {{ htmlAttributes($componentHtmlAttributes) }}
               aria-label="{{ $label }}"
               aria-describedby="input-{{ $name }}">
    </div>
    @include('bootstrap-components::components.partials.error')
    @include('bootstrap-components::components.partials.legend')
</div>
