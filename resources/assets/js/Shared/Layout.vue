<template>
    <div id="app">
        <AppNav />
        <slot />
        <AppFooter />
    </div>
</template>

<script>
import AppNav from '@/Components/AppNav'
import AppFooter from '@/Components/AppFooter'

export default {
    name: 'Layout',
    components: { AppNav, AppFooter },
}
</script>
