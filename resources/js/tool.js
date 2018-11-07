import bootstrapVue from 'bootstrap-vue';
import VueFormGenerator from "vue-form-generator/dist/vfg-core.js";
import "vue-form-generator/dist/vfg-core.css";

window.noUiSlider = require('nouislider');

Nova.booting((Vue, router) => {
    Vue.config.devtools = true;
    Vue.use(bootstrapVue);
    Vue.use(VueFormGenerator);

    router.addRoutes([
        {
            name: 'nova-bug-tracker',
            path: '/nova-bug-tracker',
            component: require('./components/Tool'),
        },
        {
            name: 'nova-bug-tracker.create',
            path: '/nova-bug-tracker/create',
            component: require('./components/Report'),
        },
        {
            name: 'nova-bug-tracker.detail',
            path: '/nova-bug-tracker/view/:report-id',
            component: require('./components/View'),
        }
    ])
});
