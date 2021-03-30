<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>


<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                    ? 'text-gray-300 hover:bg-gray-700  bg-gray-700  hover:text-white px-3 py-2 rounded-md text-sm font-medium'
                    : 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out'
            }
        }
    }
</script>
