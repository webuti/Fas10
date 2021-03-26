<template>


    <Header/>

    <teleport to="head">
        <title>FAS10 | {{bid.title}}</title>
    </teleport>
    <div class="bg-gray-100  w-full">

        <div class="  h-24 flex items-center  mx-auto max-w-7xl px-4 lg:px-8 sm:px-6 ">
            <h2 class="text-4xl mb-2 text-gray-800 font-semibold font-heading">{{bid.title}}</h2>

        </div>

    </div>


    <main class="  mx-auto max-w-7xl px-4  sm:px-6   lg:px-8  ">
        <section class="py-12 px-4">
            <div class="flex flex-wrap -mx-8">
                <div class="lg:w-1/2 px-8 lg:mt-0 order-2 lg:order-none">

                    <div class="flex mb-6">
                        <ul class="flex list-reset">
                            <li><a class="block py-2 px-3 mr-2 bg-gray-100 rounded" href="#">İlan Açıklamaları</a></li>
                            <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">Yorumlar</a></li>
                        </ul>
                    </div>
                    <p class="mb-8 text-gray-800 leading-relaxed">
                        {{bid.description}}</p>
                    <table class="w-full mb-6">
                        <tbody>
                        <tr class="border-t">
                            <td class="py-3  text-gray-500 ">Oluşturulma Tarihi</td>
                            <td class="text-right">{{bid.created_at}}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3  text-gray-500 ">Ülke</td>
                            <td class="text-right">{{bid.country.name}}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3  text-gray-500 ">Şehir</td>
                            <td class="text-right">{{bid.city.name}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <button
                        class="inline-block py-4 px-8 leading-none text-white bg-green-600 hover:bg-green-700 font-semibold rounded">
                        Bilgi Al
                    </button>

                </div>
                <div class="lg:w-1/2 px-8">

                    <img class="mb-4 rounded shadow"
                         v-for="image in bid.images" :src="(image.image)" :alt="image.image_caption"/>

                </div>
            </div>
        </section>
    </main>
</template>


<script>
    import Header from "../../Components/Header.vue";

    export default {
        components: {
            Header
        },

        props: {
            bid: [],
            images: [],
            canLogin: Boolean,
            canRegister: Boolean,
        }
    }
</script>
