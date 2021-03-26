<template>
    <div>
        <Header/>
        <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <slot></slot>
        </div>
        <Footer/>
        <teleport to="head">
            <title>FAS10 | {{title}}</title>
        </teleport>

    </div>

</template>

<script>
    import Footer from "@/Components/Footer";
    import Header from "@/Components/Header";

    export default {
        name: "MainLayout",
        components: {Footer, Header},
        props: ['title'],


    }
</script>

<style scoped>

</style>
