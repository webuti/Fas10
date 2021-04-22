<template>
    <div class="flex flex-col">


            <div class="flex">


            <span v-for="(status,date) in dates" class="w-2 h-2 border border-blue-300    "
                  :title="date +' gün sonra '+(status === availableStatusCode ? 'dolu' : 'müsait')+' olduğunu gösteriyor'"
                  :class="{'bg-blue-200':status === 1,'bg-white dark:bg-gray-600':status ===availableStatusCode}"></span>
            </div>
            <div class="text-sm text-gray-400">En erken {{firstAvailable}} gün sonra müsait</div>

    </div>
</template>

<script>
    export default {
        name: "AvailableDates",
        props: ['dates', 'teamId'],
        data() {
            return {
                firstAvailable: 0,
                availableStatusCode: 0,
            }
        },
        created() {
            Object.values(this.dates).forEach((el, index) => {
                if (el === this.availableStatusCode && this.firstAvailable === 0) {
                    this.firstAvailable = index;
                }
            });
        }
    }
</script>

<style scoped>

</style>
