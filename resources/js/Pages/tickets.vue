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
                        <th class="py-2 px-4 text-left border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border">asdasd</td>
                        <td class="py-2 px-4 border">asdasd</td>
                        <td class="py-2 px-4 border">asdasd</td>
                        <td class="py-2 px-4 border">asdasd</td>
                        <td class="py-2 px-4 border">asdasd</td>
                        <td>
                       
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

defineProps(['tickets'])

defineOptions({ layout: layout })
</script>
