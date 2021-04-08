<template>
    <div>
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        İlan Başlığı
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Şehir
                    </th>
                </tr>
            </thead>
 
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="item in items">
                    <td class="px-6 py-3 whitespace-nowrap">
                        <inertia-link
                            :href="route('bidDetail', item.id)"
                            class="w-full block h-full"
                        >
                            <h4 v-if="item.title">{{ item.title }}</h4>
                        </inertia-link>
                        <div
                            class="text-sm text-gray-400"
                            v-if="item.description"
                        >
                            {{ item.description }}
                        </div>
                    </td>
                    <td class="text-left">
                        <div v-if="item.city">{{ item.city.name }}</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "BidItemTable",
    props: ["items"],
};
</script>

<style scoped>
.icon-small {
    height: 10px;
    width: 10px;
}
</style>
