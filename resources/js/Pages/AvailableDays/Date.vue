<template>
    <div class="flex">
        <litepie-datepicker
            v-model="dateValue"
            v-slot="{ value, placeholder, clear }"
        >
            <div class="flex">
                <div class="flex-1">
                    <button
                        type="button"
                        class="block w-full bg-gray-50 dark:bg-gray-700 text-gray-400 hover:text-gray-900 dark:text-white leading-6 py-3 sm:px-6 border border-gray-200 dark:border-gray-600 rounded-xl flex items-center justify-center space-x-2 sm:space-x-4 focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 focus:outline-none transition ease-out duration-300"
                    >
            <span class="text-gray-900 dark:text-white">
              {{ value || placeholder }}
            </span>
                    </button>
                </div>
                <div class="flex-shrink-0">
                    <button
                        type="button"
                        class="ml-4 block px-3 flex-none bg-indigo-50 text-indigo-400 hover:text-indigo-900 leading-6 py-3 sm:px-6 border border-indigo-200 rounded-xl flex items-center justify-center space-x-2 sm:space-x-4 focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-indigo-300 focus:outline-none transition ease-out duration-300"
                        @click="clear"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
        </litepie-datepicker>
    </div>
</template>

<script>

    import LitepieDatepicker from 'litepie-datepicker';
    import {ref} from 'vue';

    export default {
        name: 'MyComponent',
        components: {
            LitepieDatepicker
        },
        setup() {
            const dateValue = ref([]);

            return {
                dateValue
            };
        }
    };
</script>
