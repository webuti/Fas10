<template>
    <inertia-link
        href="/"
        aria-label="FAS10"
        title="FAS10"
        class="inline-flex fas10logo items-center mr-8"
    >
        <svg
            class="w-8  text-green-400"
            viewBox="0 0 24 24"
            stroke-linejoin="round"
            stroke-width="2"
            stroke-linecap="round"
            stroke-miterlimit="10"
            stroke="currentColor"
            fill="none"
        >
            <rect class="cizgi" x="3" y="1" width="7" height="12"></rect>
            <rect class="cizgi" x="3" y="17" width="7" height="6"></rect>
            <rect class="cizgi2" x="3" y="1" width="7" height="12"></rect>
            <rect class="cizgi2" x="3" y="17" width="7" height="6"></rect>
            <rect id="fas10logorect3" x="14" y="1" width="7" height="6"></rect>
        </svg>

        <span
            class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase"
        >FAS10</span
        >
    </inertia-link>
</template>

<script>
    export default {
        name: "logo"
    }
</script>

<style scoped>


    .cizgi {
        stroke-width: 2px;
        stroke-dashoffset: 0;
        transition: 0.5s all ease;
    }

    .cizgi2 {
        stroke-width: 2px;
        stroke-dashoffset: 0;
        transform: translate3d(0px, 25px, 0px);
        transition: 0.5s all ease;

    }


    .fas10logo:hover .cizgi {
        transform: translate3d(0px, -25px, 0px);
        stroke-dashoffset: 0;


    }

    .fas10logo:hover .cizgi2 {
        transform: translate3d(0px, 0px, 0px);
        stroke-dashoffset: 0;

    }


</style>
