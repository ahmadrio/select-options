<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <select
                    v-model="value"
                    class="w-full form-control form-select"
                    :class="errorClasses"
            >
                <option v-show="field.display_choose_an_option" value="" selected>{{ __('Choose an option') }}</option>

                <option
                        v-for="option in field.options"
                        :value="option.value"
                        :selected="option.value == value"
                        :disabled="disabled == option.value"
                >
                    {{ option.label }}
                </option>
            </select>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data(){
        return{
            disabled: this.field.value_selected,
        }
    },

    mounted() {
        console.log(this.field);
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
    },
}
</script>
