<script setup>
import layout from'../layouts/layout.vue';
import { useForm } from '@inertiajs/vue3'
import user from './users.vue';
defineOptions({layout: layout});

const props = defineProps({
  user: Object
})

const form = useForm({
  name: props.user.name,
  email: props.user.email,
  role: props.user.role,
})
</script>

<template>
    <div class="min-h-screen bg-cover bg-black flex flex-col items-center justify-center" style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp); background-size: cover;min-height: calc(100vh - 64px);">

 <div class="w-1/2 mx-auto mt-10 p-6 bg-white rounded-2xl shadow-lg">
    <h1 class="text-xl font-bold mb-4">Edit User</h1>
    <form class="flex flex-col" @submit.prevent="form.put(route('users.update', props.user.id))">
    <label for="name" class="mt-4">Name</label>
            <input  v-model="form.name" class="border p-2 my-2 rounded gap-4 " type="text" name="title" placeholder="Title">
            <small class="text-red-500">{{form.errors.name}}</small>

            <span>Email</span>
            <input v-model="form.email" class="p-2 border my-2 rounded" type="text" name="problem" placeholder="Problem_Type">
            <small class="text-red-500">{{form.errors.email}}</small>
            
            <span>Role</span>
            <select  v-model="form.role" class="p-2 border my-2 rounded" name="status" >
                <option value="admin">admin</option>
                <option value="user">user</option>
                <option value="agent">agent</option>
                <option value="manager">manager</option>
            </select>
            <small class="text-red-500">{{form.errors.role}}</small>

    
            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :disabled="form.processing">
              
              update</button>

        </form>
  </div>
   </div>
 
</template>


