<template>
    <div>
        <table
            class="w-full bid-table divide-y divide-gray-200 dark:divide-gray-700"
        >
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        İlan Başlığı
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Fiyat
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Şehir
                    </th>

                    <th
                        scope="col"
                        class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Yayınlandığı Tarih
                    </th>
                </tr>
            </thead>

            <tbody
                class="bg-white dark:bg-gray-600 divide-y divide-gray-200 dark:divide-gray-700"
            >
                <tr v-for="item in items">
                    <td class="px-6 py-3 text-left whitespace-nowrap">
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
                    <td class="text-sm text-gray-600">
                        <div v-if="item.price">{{ item.price }} TL</div>
                        <div v-else>-</div>
                    </td>
                    <td class="text-sm text-gray-600">
                        <div v-if="item.city">{{ item.city.name }}</div>
                        <div v-else>-</div>
                    </td>
                    <td class="text-sm text-gray-600">
                        <div v-if="item.created_at">{{ item.created_at }}</div>
                        <div v-else>-</div>
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
.bid-table {
    text-align: center;
}
</style>
