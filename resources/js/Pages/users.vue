<script setup>
import layout from '../layouts/layout.vue'
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

function deleteUser(id) {
  if (confirm("Are you sure?")) {
    router.delete(route('users.destroy',id));
  }
}

defineProps({
  usersList: Array
});
defineOptions({ layout: layout })
</script>

<template>
 <div class=" bg-cover bg-black flex flex-col items-center " style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover; height: calc(100vh - 64px);">
    <div class="mt-5 mx-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl text-white">Users</h1>
          
        </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
    <table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>

                <th scope="col" class="px-6 py-3">
                    email
                </th>

                <th scope="col" class="px-6 py-3">
                    Role
                </th>

                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr 
             v-for = "user in usersList" :key="user.id"
            >
                <th  class="px-6 py-4 ">
                    {{ user.name }}
                </th>
                <td class="px-6 py-4">
                   {{ user.email }}
                </td>
                <td class="px-6 py-4">
                    {{ user.role }}
                </td>
                <td class="px-6 py-4">
                    {{ user.created_at }}
                </td>
                <td class="px-6 py-4">
                <button>  <a :href="route('users.edit', user.id)" class="text-white bg-gray-900 p-1 my-2 rounded hover:bg-gray-600 hover:underline">Edit</a>
                </button>

                  <button
                @click.prevent="deleteUser(user.id)"
                class="bg-red-700 ml-2 text-white p-1 my-2 rounded hover:bg-red-500"
                >
                Delete
                </button>
                </td>
            </tr>
            
            
        </tbody>
    </table>
</div>
</div>
</div>
</template>
