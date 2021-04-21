<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                    İlanlarım
                </h2>
                <inertia-link :href="route('bids.create')" class="button px-5  rounded-lg bg-green-500 dark:bg-gray-700 text-white">
                    Ekle
                </inertia-link>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-600 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider">
                                            Başlık
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider">
                                            Şirket
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider">
                                            Şehir
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-50 uppercase tracking-wider">
                                            Durum
                                        </th>

                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-600 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr v-for="bid in data.data">
                                        <td class="px-6 py-4 whitespace-nowrap">

                                             <inertia-link class="text-green-600 hover:text-green-900"
                                                          :href="route('bids.show',bid.id)">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                         :src="$page.props.user.profile_photo_url"
                                                         :alt="$page.props.user.name">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{bid.title}}
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-50">
                                                        {{bid.description}}
                                                    </div>
                                                </div>
                                            </div>
                                             </inertia-link>


                                        </td>
                                        <td class="dark:text-gray-300">
                                            {{bid.team.name}}
                                        </td>
                                        <td  class="dark:text-gray-300">
                                            <template v-if="bid.city">{{bid.city.name}}</template>

                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Yayında
                </span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <inertia-link class="text-green-600 hover:text-green-900"
                                                          :href="route('bids.edit',bid.id)">
                                                Düzenle
                                            </inertia-link>

                                        </td>
                                    </tr>

                                    <!-- More items... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </app-layout>

</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'


    export default {
        name: "Index",
        props: ['data'],
        components: {
            AppLayout,
        }
    }
</script>

<style scoped>

</style>
