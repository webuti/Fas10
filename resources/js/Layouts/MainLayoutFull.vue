<template>
    <div>
        <Header/>

        <slot></slot>

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
