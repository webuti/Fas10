<template>
    <inertia-link
        href="/"
        aria-label="FAS10"
        title="FAS10"
        class="inline-flex fas10logo items-center mr-8"
    >
        <svg
            class="w-6  logo-main text-blue-500 "

            :class="{'animate-active':animateActive}"
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

        <div
            class="ml-2 text-md font-bold tracking-wide text-gray-800 dark:text-white leading-4 flex flex-col uppercase"
        >FAS10 </div
        >
    </inertia-link>
</template>

<script>
    export default {
        name: "logo",
        data() {
            return {
                errorText: false,
                animateActive: true,
            }
        },
        mounted() {

            setTimeout(() => {
                this.animateActive = false;
            }, 1000);
        }
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

    .animate-active .cizgi2 {
        transform: translate3d(0px, 0px, 0px);
        stroke-dashoffset: 0;
    }

    .animate-active .cizgi {
        transform: translate3d(0px, -25px, 0px);
        stroke-dashoffset: 0;
    }


</style>
