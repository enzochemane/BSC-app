
<template>
  <div class="flex min-h-screen">
    
    <!-- Sidebar -->
    <sideBar class="w-64 bg-gray-800 text-white" />

    <!-- Conteúdo principal -->
     <div class="flex-1 p-4 bg-gray-100">
     <div class="mt-5 mx-4">
        <div class="flex justify-between">
   
          <h1 class="text-2xl font-bold text-gray-700">Tickets</h1>

        </div>
           <hr class="h-2 bg-gray-400 border-0 my-6 rounded">


<div class="ml-270">
<Link :href="route('tickets.create')" class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700">Create</Link>
       
        </div>

<!---------------------table tickets--------------------->
        <div class="relative overflow-x-auto border-dashed shadow-md sm:rounded-lg mt-10">
                <table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500">
                      <thead class="text-xs text-white uppercase bg-black">
            <tr>
              <th class="py-2 px-4 ">Subject</th>
              <th class="py-2 px-4 ">Problem</th>
              <th class="py-2 px-4 ">Description</th>
              <th class="py-2 px-4 ">Status</th>
              <th class="py-2 px-4 ">Creator</th>
              <th class="py-2 px-4 ">Agent</th>
              <th class="py-2 px-4 ">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="ticket in tickets" :key="ticket.id">
              <td class=" px-4 py-2">{{ ticket.subject }}</td>
              <td class=" px-4 py-2">{{ ticket.problem }}</td>
              <td class=" px-4 py-2">{{ ticket.description }}</td>
              <td class=" px-4 py-2">{{ ticket.status }}</td>
              <td class=" px-4 py-2">{{ ticket.creator?.name ?? 'N/A' }}</td>
              <td class=" px-4 py-2">{{ ticket.agent?.name ?? 'Not assigned' }}</td>
              <td class=" px-4 py-2">
                <Link :href="route('tickets.edit', ticket.id)" class="bg-gray-900 text-white p-1 my-2 rounded hover:bg-gray-700">Edit</Link>
                <button @click.prevent="deleteTicket(ticket.id)" class="bg-red-700 ml-2 text-white p-1 my-2 rounded hover:bg-red-500">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  
    </div>

  </div>
</template>

<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import sideBar from '../layouts/sideBar.vue';
import { Link, router } from '@inertiajs/vue3';

function deleteTicket(id) {
  if (confirm("Are you sure?")) {
    router.delete(route('tickets.destroy', id));
  }
}

defineProps({
  tickets: Array
});
</script>