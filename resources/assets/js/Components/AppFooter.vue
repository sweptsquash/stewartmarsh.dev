<template>
    <footer class="my-5">
        <b-container>
            <b-row>
                <b-col class="text-center">
                    <p class="mb-0">&copy; {{ year }} Stewart Marsh. All Rights Reserved.</p>
                </b-col>
            </b-row>
        </b-container>
    </footer>
</template>

<script>
export default {
    name: 'AppFooter',
    data() {
        const now = new Date()
        return {
            year: now.getFullYear(),
        }
    },
}
</script>
