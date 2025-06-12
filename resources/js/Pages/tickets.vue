<template>
    <div class=" bg-cover bg-black flex flex-col items-center " style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover; height: calc(100vh - 64px);">
    <div class="mt-5 mx-4">
        <div class="flex justify-between">
            <h1 class="text-white font-bold text-2xl">Tickets</h1>
            <Link :href="route('tickets.create')" class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700">Create</Link>
        </div>

        <table class="w-full bg-gray border shadow mt-5">
                <thead>
                    <tr>
                        <th class=" py-2 px-4 text-left border bg-gray-500">Subject</th>
                        <th class="py-2 px-4 text-left border  bg-gray-500">Problem</th>
                        <th class="py-2 px-4 text-left border  bg-gray-500">Description</th>
                        <th class="py-2 px-4 text-left border  bg-gray-500">Status</th>
                        <th class="py-2 px-4 text-left border  bg-gray-500">Creator</th>
                        <th class="py-2 px-4 text-left border  bg-gray-500">Agent</th>
                        <th class="py-2 px-4 text-left border  bg-gray-500">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                  <tr v-for="ticket in tickets" :key="ticket.id">
                       <td class="border px-4 py-2">{{ ticket.subject }}</td>
                    <td class="border px-4 py-2">{{ ticket.problem }}</td>
                    <td class="border px-4 py-2">{{ ticket.description }}</td>
                    <td class="border px-4 py-2">{{ ticket.status }}</td>
                    <td class="border px-4 py-2">{{ ticket.creator?.name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ ticket.agent?.name ?? 'Not assigned' }}</td>
                    <td class="border px-4 py-2">
                        <Link :href="route('tickets.edit', ticket.id)" class="bg-gray-900 text-white p-1 my-2 rounded hover:bg-gray-700">Edit</Link>
                       <button
  @click.prevent="deleteTicket(ticket.id)"
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
</template>




<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import layout from '../layouts/layout.vue'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';

function deleteTicket(id) {
  if (confirm("Are you sure?")) {
    router.delete(route('tickets.destroy', id));
  }
}
defineProps({
  tickets: Array
});

defineOptions({ layout: layout })
</script>
