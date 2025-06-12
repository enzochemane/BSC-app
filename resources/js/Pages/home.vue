
<script setup>
import layout from '../layouts/layout.vue';
import sideBar from '../layouts/sideBar.vue';
defineOptions({layout: layout,
  components: {sideBar}});
</script>

<template>
 
  <div class="min-h-screen bg-cover bg-black flex flex-col items-center justify-center" style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover;min-height: calc(100vh - 64px);">

    <div class="text-center">
      <h1 class="text-4xl font-bold text-gray-800">Welcome to the Ticketing System 🎫</h1>
      <p class="mt-4 text-gray-600 text-lg">Use the menu to navigate between pages</p>

      <div class="mt-8 flex gap-4 justify-center">
        <Link 
          href="/tickets" 
          class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition"
        >
          View Tickets
        </Link>
        <Link 
          href="/tickets/create" 
          class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700 transition"
        >
         New Ticket
        </Link>
      </div>
    </div>
  </div>

 
  

</template>
