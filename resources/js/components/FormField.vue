<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <select
                    v-model="value"
                    class="w-full form-control form-select"
                    :class="errorClasses"
            >
                <option v-for="(option, index) in field.default_value" :value="index" selected disabled>{{ option }}</option>

                <option
                        v-for="option in field.options"
                        :value="option.value"
                        :selected="option.value == value"
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
