<template>
    <div class=" flex items-center justify-between    mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl  ">
        <inertia-link href="/" class="  p-2 flex rounded  text-gray-600  items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8" viewBox="0 0 20 20" fill="currentColor">
                <path fillRule="evenodd"
                      d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                      clipRule="evenodd"/>
            </svg>
            Geri
        </inertia-link>
        <inertia-link href="/?" class="border border-gray-400  text-gray-600  p-2 flex rounded items-center  ">

            <svg xmlns="http://www.w3.org/2000/svg"  class="h-8" viewBox="0 0 20 20" fill="currentColor">
                <path fillRule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clipRule="evenodd" />
            </svg>
            İş Ortaklarıma ekle
        </inertia-link>
    </div>
</template>

<script>
    export default {
        name: "BidNavigation",

        created() {

        }
    }
</script>

<style scoped>

</style>
