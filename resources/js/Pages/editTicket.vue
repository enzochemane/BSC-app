<script setup>
import layout from'../layouts/layout.vue';
import { useForm } from '@inertiajs/vue3'

defineOptions({layout: layout});
defineProps({ ticket: Object })

const form = useForm({
    subject: ticket.subject,
    problem: ticket.problem,
    description: ticket.description,
    status: ticket.status
});


const submit = () => {
    form.put(route('tickets.update', ticket.id));
};

</script>

<template>

    <div class="w-1/2 mx-auto mt-10 p-6 bg-white rounded-2xl shadow-lg">
 <h2 class="font-bold text-2xl">Edit Tickets</h2>
        <form @submit.prevent="submit" class="flex flex-col">
            
           <label for="title" class="mt-4">Title</label>
            <input  v-model="form.subject" class="border p-2 my-2 rounded gap-4 " type="text" name="title" placeholder="Title">
            <small class="text-red-500">{{form.errors.subject}}</small>

            <span>Problem Type</span>
            <input v-model="form.problem" class="p-2 border my-2 rounded" type="text" name="problem" placeholder="Problem_Type">
            <small class="text-red-500">{{form.errors.problem}}</small>
            
            <span>Status</span>
            <select  v-model="form.status" class="p-2 border my-2 rounded" name="status" >
                 <option value="">status</option>
                <option value="open">Open</option>
                <option value="closed">Close</option>
                <option value="resolved">Resolved</option>
            </select>
            <small class="text-red-500">{{form.errors.status}}</small>

            <textarea  v-model="form.description" class="border p-2 my-2 rounded" type="text" name="description"  rows="4" placeholder="Description"></textarea>
            <small class="text-red-500">{{form.errors.description}}</small>
            

            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :disabled="form.processing">Register</button>
        </form>
    </div>

</template>

