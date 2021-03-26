<template>

    <MainLayout>


        {{text}}
    </MainLayout>

</template>

<script>
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import MainLayout from "@/Layouts/MainLayout";

    export default {
        props: ['text'],

        components: {
            MainLayout,
            JetAuthenticationCardLogo,
        },
    }
</script>
