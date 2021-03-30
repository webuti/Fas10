<template>
    <div class="bg-white text-gray-800 px-3 py-4 flex items-center border-b justify-between">
        <h2 class="font-bold "> {{team.name}}</h2>
        <div class="buttons flex space-x-1">


            <inertia-link :href="route('partners.approve')" :data="{id,team_id : team.id,status :3}" method="post"
                          as="button"
                          type="button"
                          class="border flex border-gray-400 text-gray-400 text-sm font-bold rounded-full p-1 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12"/>
                </svg>
                İPTAL ET
            </inertia-link>


            <inertia-link v-if="approve" :href="route('partners.approve')" :data="{id,team_id : team.id,status:2}"
                          method="post"
                          as="button"
                          type="button"
                          class="border flex border-green-400 bg-green-400 text-white font-bold text-sm rounded-full p-1 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fillRule="evenodd"
                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                          clipRule="evenodd"/>
                </svg>
                ONAYLA
            </inertia-link>

        </div>

    </div>
</template>

<script>
    export default {
        name: "PartnerListItem",
        props: ['team', 'id', 'approve']
    }
</script>

<style scoped>

</style>
