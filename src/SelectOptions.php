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

    /**
     * Options value
     *
     * @param array $options
     * @param bool $displayChooseAnOption
     * @return SelectOptions
     */
    public function options(array $options, $displayChooseAnOption = false)
    {
        return $this->withMeta([
            'options' => collect($options ?? [])->map(function ($label, $value) {
                return ['label' => $label, 'value' => $value];
            })->values()->all(),
            'display_choose_an_option' => $displayChooseAnOption,
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
        ]);
    }
}
