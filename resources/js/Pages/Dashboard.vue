<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class=" ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



                <section class="py-8 px-4">
  <div class="flex flex-wrap -mx-4">
    <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
      <div class="h-full border rounded shadow">
        <div class="flex items-center justify-between py-3 px-4 border-b">
          <h3 class="text-lg font-semibold font-heading">Income</h3>
          <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">Monthly</span>
        </div>
        <div class="flex flex-col p-4">
          <h3 class="text-3xl mb-3 font-semibold font-heading font-semibold">108,200</h3>
          <span>Total income</span>
          <span class="text-green-500">82%</span>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
      <div class="h-full border rounded shadow">
        <div class="flex items-center justify-between px-4 py-3 border-b">
          <h3 class="text-lg font-semibold font-heading">Orders</h3>
          <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">Monthly</span>
        </div>
        <div class="flex flex-col p-4">
          <h3 class="text-3xl mb-3 font-semibold font-heading font-semibold">128,430</h3>
          <span>New orders</span>
          <span class="text-green-500">32%</span>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
      <div class="h-full border rounded shadow">
        <div class="flex items-center justify-between px-4 py-3 border-b">
          <h3 class="text-lg font-semibold font-heading">Visits</h3>
          <span class="py-1 px-3 text-sm text-white font-semibold bg-green-500 rounded-full">Monthly</span>
        </div>
        <div class="flex flex-col p-4">
          <h3 class="text-3xl mb-3 font-semibold font-heading font-semibold">81,248</h3>
          <span>New visits</span>
          <span class="text-green-500">24%</span>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
      <div class="h-full border rounded shadow">
        <div class="flex items-center justify-between px-4 py-3 border-b">
          <h3 class="text-lg font-semibold font-heading">Conversions</h3>
          <span class="py-1 px-3 text-sm text-white font-semibold bg-red-500 rounded-full">Today</span>
        </div>
        <div class="flex flex-col p-4">
          <h3 class="text-3xl mb-3 font-semibold font-heading font-semibold">7%</h3>
          <span>Purchased more than once</span>
          <span class="text-red-500">82%</span>
        </div>
      </div>
    </div>
  </div>
</section>

                <section class="p-4">
  <div class="flex flex-wrap -mx-8">
    <div class="md:w-1/3 py-4 px-8 mb-4 md:mb-0">
      <h3 class="text-2xl font-semibold font-heading">Great quality</h3>
      <p class="my-4 text-gray-400 leading-relaxed">Our paper is literally tempting you to print something. Even if you already have a paper supplier, we can change that!</p>
      <a class="text-green-600 hover:underline" href="#">Learn more »</a>
    </div>
    <div class="md:w-1/3 py-4 px-8 mb-4 md:mb-0">
      <h3 class="text-2xl font-semibold font-heading">Fast delivery</h3>
      <p class="my-4 text-gray-400 leading-relaxed">Business in need? We can prepare next-day delivery if necessary. The supplies will be delivered to your company every first Monday.</p>
      <a class="text-green-600 hover:underline" href="#">Learn more »</a>
    </div>
    <div class="md:w-1/3 py-4 px-8 mb-4 md:mb-0">
      <h3 class="text-2xl font-semibold font-heading">Attractive discounts</h3>
      <p class="my-4 text-gray-400 leading-relaxed">Every customer gets 10% discount on the other paper supplies. You never know, when we will launch something interesting.</p>
      <a class="text-green-600 hover:underline" href="#">Learn more »</a>
    </div>
  </div>
</section>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
    }
</script>
