<template>
    <div class="mt-5 mx-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-2xl">Tickets</h1>
            <Link :href="route('tickets.create')" class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700">Create</Link>
        </div>

        <table class="w-full bg-white border border-gray-400 shadow">
                <thead>
                    <tr>
                        <th class=" py-2 px-4 text-left border">Subject</th>
                        <th class="py-2 px-4 text-left border">Problem</th>
                        <th class="py-2 px-4 text-left border">Description</th>
                        <th class="py-2 px-4 text-left border">Status</th>
                        <th class="py-2 px-4 text-left border">Creator</th>
                        <th class="py-2 px-4 text-left border">Agent</th>
                        <th class="py-2 px-4 text-left border">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <tr v-for="ticket in tickets" :key="ticket.id">
                       <td class="border px-4 py-2">{{ ticket.subject }}</td>
                    <td class="border px-4 py-2">{{ ticket.problem }}</td>
                    <td class="border px-4 py-2">{{ ticket.description }}</td>
                    <td class="border px-4 py-2">{{ ticket.status }}</td>
                    <td class="border px-4 py-2">{{ ticket.creator?.name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ ticket.agent?.name ?? 'Não atribuído' }}</td>
                    <td class="border px-4 py-2">
                        <Link :href="route('tickets.edit', ticket.id)" class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700">Edit</Link>
                        
                    </td>
                    </tr>
                </tbody>
        </table>
    </div>

</template>




<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import layout from '../layouts/layout.vue'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3';


defineProps({
  tickets: Array
});

defineOptions({ layout: layout })
</script>
