<template>
    <b-container>
        <b-row class="header mt-4">
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
                    title="Twitter"
                >
                    <font-awesome-icon :icon="['fab', 'twitter']" />
                </b-button>
                <b-button
                    variant="primary"
                    href="https://www.linkedin.com/in/sweptsquash/"
                    target="_blank"
                    rel="noopener noreferrer"
                    title="LinkedIn"
                >
                    <font-awesome-icon :icon="['fab', 'linkedin-in']" />
                </b-button>
                <b-button
                    variant="primary"
                    href="https://github.com/sweptsquash"
                    target="_blank"
                    rel="noopener noreferrer"
                    title="Github"
                >
                    <font-awesome-icon :icon="['fab', 'github']" />
                </b-button>
            </b-col>
            <b-col>
                <img :src="avatar" alt="Stewart Marsh" />
            </b-col>
        </b-row>
        <b-row>
            <b-col :cols="12">
                <h2 class="text-center my-5">Skills</h2>
            </b-col>
            <b-col :cols="12">
                <ul class="skills d-flex flex-wrap justify-content-center">
                    <li>
                        HTML
                        <span>18 Years</span>
                    </li>
                    <li>
                        CSS
                        <span>18 Years</span>
                    </li>
                    <li>
                        JavaScript
                        <span>17 Years</span>
                    </li>
                    <li>
                        PHP
                        <span>16 Years</span>
                    </li>
                    <li>
                        SQL
                        <span>15 Years</span>
                    </li>
                    <li>
                        SEO
                        <span>15 Years</span>
                    </li>
                    <li>
                        Adobe
                        <span>7 Years</span>
                    </li>
                    <li>
                        C#
                        <span>5 Years</span>
                    </li>
                    <li>
                        Linux
                        <span>5 Years</span>
                    </li>
                    <li>
                        Visual Studio
                        <span>5 Years</span>
                    </li>
                    <li>
                        HighCharts
                        <span>4 Years</span>
                    </li>
                    <li>
                        CloudFlare
                        <span>4 Years</span>
                    </li>
                    <li>
                        UnrealEngine 4
                        <span>4 Years</span>
                    </li>
                    <li>
                        Git
                        <span>4 Years</span>
                    </li>
                    <li>
                        JIRA
                        <span>4 Years</span>
                    </li>
                    <li>
                        NodeJS
                        <span>2 Years</span>
                    </li>
                    <li>
                        C++
                        <span>1 Year</span>
                    </li>
                    <li>
                        React
                        <span>1 Year</span>
                    </li>
                    <li>
                        VueJS
                        <span>1 Year</span>
                    </li>
                    <li>
                        InertiaJS
                        <span>1 Year</span>
                    </li>
                    <li>
                        Kubernetes
                        <span>8 Months</span>
                    </li>
                    <li>
                        Docker
                        <span>8 Months</span>
                    </li>
                </ul>
            </b-col>
            <b-col :cols="12">
                <h2 class="text-center my-5">Brands I've Work With</h2>
                <b-row class="mb-5">
                    <b-col class="text-center">
                        <a
                            href="https://www.dividebuy.co.uk"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img :src="dividebuy" alt="DivideBuy" height="40" />
                        </a>
                    </b-col>
                    <b-col class="text-center">
                        <a
                            href="https://www.improbable.io/"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img :src="improbable" alt="Improbable" height="40" />
                        </a>
                    </b-col>
                    <b-col class="text-center">
                        <a
                            href="https://www.mtivity.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img :src="mtivity" alt="Mtivity" height="40" />
                        </a>
                    </b-col>
                    <b-col class="text-center">
                        <a
                            href="https://www.trailermaster.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <img :src="trailermaster" alt="TrailerMaster" height="40" />
                        </a>
                    </b-col>
                </b-row>
            </b-col>
            <b-col :cols="12" class="text-center">
                <inertia-link class="btn btn-primary" :href="this.route('experience')">
                    View My Experience
                </inertia-link>
                <inertia-link class="btn btn-primary" :href="this.route('contact')">
                    Contact Me
                </inertia-link>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import avatar from '@/../images/avatar.png'
import dividebuyLogo from '@/../images/Logos/dividebuy-logo.png'
import improbableLogo from '@/../images/Logos/improbable-logo.png'
import mtivityLogo from '@/../images/Logos/mtivity-logo.png'
import trailermasterLogo from '@/../images/Logos/trailermaster-logo.png'

import Layout from '@/Shared/Layout'

export default {
    layout: Layout,
    data() {
        return {
            avatar: avatar,
            dividebuy: dividebuyLogo,
            improbable: improbableLogo,
            mtivity: mtivityLogo,
            trailermaster: trailermasterLogo,
        }
    },
}
</script>
