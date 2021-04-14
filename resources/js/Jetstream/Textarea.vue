<template>
    <textarea
        class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-400"
        @input="$emit('update:modelValue', $event.target.value)" ref="textarea">{{modelValue}}</textarea>
</template>

<script>
    export default {
        name: "jet-textarea",
        props: ['modelValue'],
        emits: ['update:modelValue'],
        methods: {
            focus() {
                this.$refs.textarea.focus()
            }
        }
    }
</script>

