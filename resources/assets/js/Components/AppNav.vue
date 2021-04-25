<template>
    <b-navbar toggleable="lg" type="dark">
        <b-container>
            <b-navbar-toggle target="nav-collapse" />
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto mr-auto">
                    <li :class="{ 'nav-item': true, active: route().current('home') }">
                        <inertia-link :href="route('home')" class="nav-link">Home</inertia-link>
                    </li>
                    <li :class="{ 'nav-item': true, active: route().current('experience') }">
                        <inertia-link :href="route('experience')" class="nav-link">
                            Experience
                        </inertia-link>
                    </li>
                    <li :class="{ 'nav-item': true, active: route().current('contact') }">
                        <inertia-link :href="route('contact')" class="nav-link">
                            Contact Me
                        </inertia-link>
                    </li>
                </b-navbar-nav>
            </b-collapse>
        </b-container>
    </b-navbar>
</template>

<script>
export default {
    name: 'AppNav',
}
</script>
