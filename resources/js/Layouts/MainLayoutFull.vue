<template>
    <div class="bg-white dark:bg-gray-800 dark:bg-gray-600">
        <Header />

        <slot></slot>

        <Footer />
        <teleport to="head">
            <title>FAS10 | {{ title }}</title>
        </teleport>
    </div>
</template>

<script>
import Footer from "@/Components/Footer";
import Header from "@/Components/Header";

export default {
    name: "MainLayout",
    components: { Footer, Header },
    props: ["title"],
};
</script>

<style scoped></style>
