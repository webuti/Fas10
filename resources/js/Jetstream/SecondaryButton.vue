<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-600 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 dark:text-white uppercase tracking-widest shadow-sm hover:text-gray-500 dark:text-gray-50 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 dark:text-white active:bg-gray-50 dark:bg-gray-700 transition ease-in-out duration-150">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    }
</script>
