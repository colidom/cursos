Vue.component('vue-directives', {
    template: `
                <div>
                <h1 v-text="title"></h1>
                    <p v-text="text"></p>
                    <a :href="link.href" :title="link.title" v-text="link.text"></a>
                    <DirectiveHtml/>
                </div>
                `,
    data() {
        return {
            title: 'Directivas de Vue.js',
            text: 'Texto de prueba v-text',
            link: {
                text: 'VueJS Home',
                href: 'https://vuejs.org/',
                title: 'Documentación VueJS'
            }
        }
    },
    components: {
        DirectiveHtml,
    }
})