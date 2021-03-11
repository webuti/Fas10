<template>


    <Header/>
    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <section class="py-12 px-4">
            <div class="flex flex-wrap -mx-8">
                <div class="lg:w-1/2 px-8 mt-6 lg:mt-0 order-2 lg:order-none">
                    <h2 class="text-4xl mb-2 font-semibold font-heading">{{bid.title}}</h2>
                    <p class="mb-6">$9,99 (Ex. Tax)</p>
                    <div class="flex mb-6">
                        <ul class="flex list-reset">
                            <li><a class="block py-2 px-3 mr-2 bg-gray-100 rounded" href="#">Product Details</a></li>
                            <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">Reviews</a></li>
                            <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <p class="mb-8 text-gray-400 leading-relaxed">
                        {{bid.description}}.</p>
                    <table class="w-full mb-6">
                        <tbody>
                        <tr class="border-t">
                            <td class="py-3">Sheets of paper per ream</td>
                            <td class="text-right">500</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3">Reams per box</td>
                            <td class="text-right">5</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-3">Basis weight</td>
                            <td class="text-right">80mg</td>
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
                         v-for="image in bid.images" :src="'/'+(image.image)" :alt="image.image_caption"/>

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
