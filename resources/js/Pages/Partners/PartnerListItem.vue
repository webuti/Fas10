<template>
    <div class="bg-white text-gray-800 px-3 py-4 flex items-center border-b justify-between">
        <h2 class="font-bold "> {{team.name}}</h2>
        <div class="buttons space-x-1">
            <button type="button" class="border border-gray-400 text-gray-400 text-sm font-bold rounded-full p-1 px-3">İPTAL ET </button>
            <button type="button" class="border border-green-400 bg-green-400 text-white font-bold text-sm rounded-full p-1 px-3">ONAYLA</button>
        </div>

    </div>
</template>

<script>
    export default {
        name: "PartnerListItem",
        props: ['team']
    }
</script>

<style scoped>

</style>
