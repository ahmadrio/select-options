<?php

namespace Opanegro\SelectOptions;

use Laravel\Nova\Fields\Field;

class SelectOptions extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'select-options';

    protected $defaultValue = [];

    /**
     * Options value
     *
     * @param array $options
     * @param null $defaultValue
     * @return SelectOptions
     */
    public function options(array $options, $defaultValue = null)
    {
        if (!is_null($defaultValue)) $this->defaultValue[$defaultValue] = $options[$defaultValue];

        return $this->withMeta([
            'options' => collect($options ?? [])->map(function ($label, $value) use ($defaultValue) {
                if ($defaultValue != $value) return ['label' => $label, 'value' => $value];
            })->filter()->values()->all()
        ]);
    }

    /**
     * Disable default selected value
     *
     * @param bool $bool
     * @return SelectOptions
     */
    public function valueSelectedDisabled($bool = false)
    {
        return $this->withMeta([
            'value_selected' => $bool,
            'default_value' => $this->defaultValue
        ]);
    }
}
