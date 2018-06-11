<?php

namespace Okipa\LaravelBootstrapComponents\Form;

class InputText extends Input
{
    /**
     * The component config key.
     *
     * @property string $view
     */
    protected $configKey = 'input_text';
    /**
     * The input type.
     *
     * @property string $type
     */
    protected $type = 'text';

    /**
     * Set the input values.
     *
     * @return array
     * @throws \Exception
     */
    protected function values(): array
    {
        return array_merge(parent::values(), [
            'type' => 'text',
        ]);
    }
}
