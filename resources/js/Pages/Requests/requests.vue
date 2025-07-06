
<template>
  <div class="flex min-h-screen">
    
    <!-- Sidebar -->
    <sideBar class="w-64" />

    <!-- Conteúdo principal -->
     <div class="flex-1 p-4 bg-gray-50 dark:bg-gray-800">
     <div class="mt-5 mx-4">
        <div class="flex justify-between">
   
          <h1 class="text-2xl font-bold text-gray-700 dark:text-white">Requests</h1>

        </div>
           <hr class="h-2 bg-gray-300 border-0 my-6 rounded dark:bg-gray-300">


<div class="flex">
<Link :href="route('request.create')" class="ml-auto bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700">Create</Link>
       
        </div>

<!---------------------table tickets--------------------->
<div v-if="requests && requests.length > 0" class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
<table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500  border-gray-500">
                      <thead class="text-xs text-white uppercase bg-black">
            <tr>
              <th class="py-2 px-4 ">Name</th>
              <th class="py-2 px-4 ">Request Type</th>
              <th class="py-2 px-4 ">Description</th>
              <th class="py-2 px-4 ">Status</th>
              <th class="py-2 px-4 ">Agent</th>
              <th class="py-2 px-4 ">Manager</th>
              <th class="py-2 px-4 ">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="request in requests" :key="request.id">
           <td class=" px-4 py-2">{{ request.user?.name ??'N/A' }}</td>
           <td class="px-4 py-2">{{ request.request_type}}</td>
           <td class="px-4 py-2">{{ request.message }}</td>
           <td class="px-4 py-2">{{ request.status }}</td>
           <td class="px-4 py-2">{{ request.agent?.name ?? 'N/A' }}</td>
           <td class="px-4 py-2">{{ request.manager?.name ?? 'N/A' }}</td>
              <td class=" px-4 py-2">
                <Link :href="route('request.edit', request.id)" class="bg-gray-900 text-white p-1 my-2 rounded hover:bg-gray-700">Edit</Link>
                <button @click.prevent="deleteRequest(request.id)" class="bg-red-700 ml-2 text-white p-1 my-2 rounded hover:bg-red-500">Delete</button>   
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div v-else class="flex justify-center items-center mt-10">
      <h1 class="text-2xl font-semibold text-gray-600 dark:text-gray-200">No requests found</h1>
      </div>
    </div>
  
    </div>

  </div>
</template>

<script setup>
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import sideBar from '../../layouts/sideBar.vue';
import { Link, router } from '@inertiajs/vue3';



function deleteRequest(id) {
  if (confirm("Are you sure?")) {
    router.delete(route('request.destroy', id));
  }
}

defineProps({
  requests: Array,
  manager: Array
});
</script>