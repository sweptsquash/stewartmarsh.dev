<template>
    <b-container>
        <b-row class="header">
            <b-col class="text-center">
                <h1>
                    Hi! I'm Stewart Marsh,
                    <br />
                    A Full Stack Developer
                </h1>
                <p class="mb-4">
                    Self taught software engineer with over
                    <br />
                    13 years of industry experience.
                </p>
                <b-button
                    variant="primary"
                    href="https://www.twitter.com/sweptsquash"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <font-awesome-icon :icon="['fab', 'twitter']" />
                </b-button>
                <b-button
                    variant="primary"
                    href="https://www.linkedin.com/in/sweptsquash/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <font-awesome-icon :icon="['fab', 'linkedin-in']" />
                </b-button>
                <b-button
                    variant="primary"
                    href="https://github.com/sweptsquash"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <font-awesome-icon :icon="['fab', 'github']" />
                </b-button>
            </b-col>
            <b-col>
                <img :src="avatar" />
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import avatar from '@/../images/avatar.png'
import Layout from '@/Shared/Layout'

export default {
    layout: Layout,
    data() {
        return {
            avatar: avatar,
        }
    },
}
</script>
