require('./bootstrap');
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
//bootstrap
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


//inertia

createInertiaApp({
    resolve: async name => {
        return (await import(`./Pages/${name}`)).default
    },
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .mount(el)
    },
})
