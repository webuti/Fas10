<template>
    <div>
        <button :class="classes" class="w-full text-left" v-if="as == 'button'">
            <slot></slot>
        </button>
        <inertia-link :href="href" :class="classes" v-else>
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
    export default {
        props: ['active', 'href', 'as'],

        computed: {
            classes() {

                return this.active
                    ? 'block pl-3 pr-4 py-2 border-l-4 border-blue-400 text-base font-medium text-blue-700 bg-blue-50 dark:bg-gray-700 focus:outline-none focus:text-blue-800 focus:bg-blue-100 focus:border-blue-700 transition duration-150 ease-in-out'
                    : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-200 hover:text-gray-800 dark:text-white hover:bg-gray-50 dark:bg-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-800 dark:text-white focus:bg-gray-50 dark:bg-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
            }
        }
    }
</script>
