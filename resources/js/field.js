Nova.booting((Vue, router, store) => {
    Vue.component('index-select-options', require('./components/IndexField'))
    Vue.component('detail-select-options', require('./components/DetailField'))
    Vue.component('form-select-options', require('./components/FormField'))
})
