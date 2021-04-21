module.exports = {
    root: true,
    extends: ['eslint:recommended', 'plugin:vue/essential', 'prettier', 'prettier/vue'],
    env: {
        browser: true,
        node: true,
    },
    parser: 'vue-eslint-parser',
    parserOptions: {
        parser: 'babel-eslint',
        sourceType: 'module',
        ecmaVersion: 11,
        ecmaFeatures: {
            jsx: true,
        },
    },
    plugins: ['babel', 'prettier'],
    rules: {
        'comma-dangle': ['error', 'always-multiline'],
        'no-console':
            process.env.NODE_ENV === 'production' ? ['error', { allow: ['warn', 'error'] }] : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
        quotes: ['error', 'single', { avoidEscape: true }],
        'vue/component-tags-order': [
            'error',
            {
                order: ['template', 'script', 'style'],
            },
        ],
        'vue/no-template-target-blank': [
            'error',
            {
                allowReferrer: false,
                enforceDynamicLinks: 'always',
            },
        ],
    },
    globals: {
        _: 'readable',
        axios: 'readable',
        moment: 'readable',
        route: 'readable',
        Twitch: 'readable',
        twitchAPI: 'readable',
        Vue: 'readable',
    },
}
