
<script setup>
import layout from'../layouts/layout.vue';
import { useForm } from '@inertiajs/vue3'

defineOptions({layout: layout});
defineProps({
    user: String
})

const form = useForm({
    title:null,
    problem:null,
    description:null,
    status:null,
});

const submit = ()=>{
    form.post('/tickets');
};

</script>
<template>

    <p> Tickets page {{ user }}</p>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-gray-100 rounded-2xl shadow-lg">
 <h2 class="font-bold text-2xl">Open Tickets</h2>
        <form @submit.prevent="submit" class="flex flex-col">
            
           <label for="title" class="mt-4">Title</label>
            <input  v-model="form.title" class="border p-2 my-2 rounded gap-4 " type="text" name="title" placeholder="Title">
            <small class="text-red-500">{{form.errors.title}}</small>

            <span>Problem Type</span>
            <input v-model="form.problem" class="p-2 border my-2 rounded" type="text" name="problem" placeholder="Problem_Type">
            <small class="text-red-500">{{form.errors.problem}}</small>
            
            <span>Status</span>
            <select  v-model="form.problem" class="p-2 border my-2 rounded" name="problem" >
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

