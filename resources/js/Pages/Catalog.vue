<template>


<Header />
    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
 test
</main>
</template>


<script>
import Header from "../Components/Header.vue";

    export default { 
        components:{
            Header
        },

        props: { 
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
