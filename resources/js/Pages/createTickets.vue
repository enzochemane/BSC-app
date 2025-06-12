
<script setup>
import layout from'../layouts/layout.vue';
import { useForm } from '@inertiajs/vue3'

defineOptions({layout: layout});
defineProps({
    user: String
})

const form = useForm({
    subject:null,
    problem:null,
    description:null,
    status:null,
});

const submit = ()=>{
    form.post('/tickets');
};

</script>
<template>
<div class="bg-gray-100 p-10" style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover;min-height: calc(100vh - 64px);">

    <div class="w-1/2 mx-auto  p-6 bg-white shadow-lg" >
       
 <h2 class="font-bold text-2xl">Open Tickets</h2>
        <form @submit.prevent="submit" class="flex flex-col">
            
           <label for="title" class="mt-4">Subject</label>
            <input  v-model="form.subject" class="border p-2 my-2 rounded gap-4 " type="text" name="title" placeholder="Title">
            <small class="text-red-500">{{form.errors.subject}}</small>

            <span>Problem Type</span>
            <input v-model="form.problem" class="p-2 border my-2 rounded" type="text" name="problem" placeholder="Problem_Type">
            <small class="text-red-500">{{form.errors.problem}}</small>


            <textarea  v-model="form.description" class="border p-2 my-2 rounded" type="text" name="description"  rows="4" placeholder="Description"></textarea>
            <small class="text-red-500">{{form.errors.description}}</small>
            

            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :disabled="form.processing">Open</button>

        </form>
    </div>
</div>
</template>

