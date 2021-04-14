<template>
    <div>
        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Şirket Adı
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Şehir
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Çalışan Sayısı
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider"
                    >
                        Hizmetler
                    </th>
                 
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-gray-600 divide-y divide-gray-200 dark:divide-gray-700">
                <tr v-for="company in companies">
                    <td class="px-6 py-3 whitespace-nowrap">
                        <inertia-link
                            :href="route('companyDetail', company.id)"
                            class="w-full block h-full"
                        >
                            <h4 v-if="company.name">{{
                                company.name
                            }}</h4>
                        </inertia-link>
                        <div class="text-sm text-gray-400" v-if="company.description">{{
                            company.description
                        }}</div>
                    </td>
                    <td class="text-left">
                        <div v-if="company.city">{{
                            company.city.name
                        }}</div>
                    </td>
                    <td class="text-left">
                        <template v-if="company.number_of_staff">
                            {{ company.number_of_staff }} Personel
                        </template>
                    </td>
                    <td>
                        <div
                            class="flex flex-wrap justify-starts text-sm items-center mt-4"
                        >
                            <Badge v-for="cat in company.services">{{
                                cat.service.name
                            }}</Badge>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Badge from "@/Components/UI/Badge";

export default {
    name: "CompanyItemTable",
    components: { Badge },
    props: ["companies"],
};
</script>

<style scoped>
.icon-small {
    height: 10px;
    width: 10px;
}
</style>
