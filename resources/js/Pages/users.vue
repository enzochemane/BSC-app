<script setup>
import sideBar from '../layouts/sideBar.vue';
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import { Link, router } from '@inertiajs/vue3';

function deleteUser(id) {
  if (confirm("Are you sure?")) {
    router.delete(route('users.destroy', id));
  }
}

defineProps({
  usersList: Array
});
</script>

<template>
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <sideBar class="w-64 bg-gray-800 text-white" />

    <!-- Conteúdo principal -->
     <div class="flex-1 p-4 bg-gray-100">
      <div class="mt-5 mx-4">
        <div class="flex justify-between">
          <h1 class="text-2xl font-bold text-gray-700">Accounts</h1>
       
        </div>
 <hr class="h-2 bg-gray-400 border-0 my-6 rounded">


        <div class="relative overflow-x-auto border-dashed shadow-md sm:rounded-lg mt-10">
          <table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-black">
              <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Role</th>
                <th class="px-6 py-3">Created At</th>
                <th class="px-6 py-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in usersList" :key="user.id">
                <th class="px-6 py-4">{{ user.name }}</th>
                <td class="px-6 py-4">{{ user.email }}</td>
                <td class="px-6 py-4">{{ user.role }}</td>
                <td class="px-6 py-4">{{ user.created_at }}</td>
                <td class="px-6 py-4">
                  <Link :href="route('users.edit', user.id)" class="text-white bg-gray-900 p-1 my-2 rounded hover:bg-gray-600">Edit</Link>
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
  </div>
</template>
