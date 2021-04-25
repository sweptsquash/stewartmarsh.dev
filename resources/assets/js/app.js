import route from 'ziggy'
import { Ziggy } from '@/ziggy'
import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import Vue from 'vue'
import VueMeta from 'vue-meta'
import { BootstrapVue } from 'bootstrap-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faGithub, faLinkedinIn, faTwitter } from '@fortawesome/free-brands-svg-icons'

library.add(faGithub, faLinkedinIn, faTwitter)

Vue.config.productionTip = false
Vue.use(plugin)
Vue.use(BootstrapVue)
Vue.use(VueMeta)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.mixin({
    methods: {
        route: (name, params, absolute, config = Ziggy) => route(name, params, absolute, config),
    },
})

InertiaProgress.init()

const el = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: (title) =>
            title ? `${title} | Stewart Marsh Portfolio` : 'Stewart Marsh Portfolio',
    },
    render: (h) =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: (name) =>
                    import(`@/Pages/${name}`).then((module) => module.default),
                resolveErrors: (page) => page.props.errors || {},
            },
        }),
}).$mount(el)
