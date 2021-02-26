<template>


<Header />
    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
<section class="py-12 px-4">
  <div class="flex flex-wrap -mx-8">
    <div class="lg:w-1/2 px-8 mt-6 lg:mt-0 order-2 lg:order-none">
      <h2 class="text-4xl mb-2 font-semibold font-heading">All Purpose Paper 80gsm - 500 sheets - 10 Reams</h2>
      <p class="mb-6">$9,99 (Ex. Tax)</p>
      <div class="flex mb-6">
        <ul class="flex list-reset">
          <li><a class="block py-2 px-3 mr-2 bg-gray-100 rounded" href="#">Product Details</a></li>
          <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">Reviews</a></li>
          <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">FAQ</a></li>
        </ul>
      </div>
      <p class="mb-8 text-gray-400 leading-relaxed">Premium quality home and office paper for all printing and copying machines. It is a flexible paper capable of switching from one machine to another with great print results.</p>
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
      <button class="inline-block py-4 px-8 leading-none text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded">Buy Now!</button>
    </div>
    <div class="lg:w-1/2 px-8">
      <img class="mb-4 rounded shadow" src="placeholders-2-0/pictures/paper.jpg" alt="">
      <div class="flex flex-wrap -mx-2">
        <div class="w-1/3 px-2"><img class="rounded shadow" src="placeholders-2-0/pictures/paper.jpg" alt=""></div>
        <div class="w-1/3 px-2"><img class="rounded shadow" src="placeholders-2-0/pictures/paper.jpg" alt=""></div>
        <div class="w-1/3 px-2"><img class="rounded shadow" src="placeholders-2-0/pictures/paper.jpg" alt=""></div>
      </div>
    </div>
  </div>
</section>
</main>
</template>


<script>
import Header from "../Components/Header.vue";

    export default { 
        components:{
            Header
        },

        props: { 
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
