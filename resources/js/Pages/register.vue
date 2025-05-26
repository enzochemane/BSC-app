<script setup>

import { useForm } from '@inertiajs/vue3'
const form = useForm({
    name:null,
    email:null,
    password:null,
    password_confirmation:null,
});

const submit = ()=>{
    form.post('/register',{
        onError: () => form.reset('password', 'password_confirmation'),
    
    });
};
</script>

<template>
<div class="bg-gray-50 min-h-screen flex  items-center justify-center">
    <!--conteiner do login-->
<div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5">

    <!--formulario-->
    <div class=" sm:w-1/2 px-16">
        <h2 class="font-bold text-2xl">Register</h2>
        <form @submit.prevent="submit" class="flex flex-col">
            
            <input  v-model="form.name" class="border p-2 my-2 rounded gap-4 mt-8" type="text" name="name" placeholder="name">
            <small class="text-red-500">{{form.errors.name}}</small>
            <input v-model="form.email" class="p-2 border my-2 rounded" type="text" name="email" placeholder="email">
            <small class="text-red-500">{{form.errors.email}}</small>
            <input v-model="form.password" class="border p-2 my-2 rounded" type="text" name="password" placeholder="password">
            <small class="text-red-500">{{form.errors.password}}</small>
            <input v-model="form.password_confirmation" class="p-2 border my-2 rounded" type="text" name="confirm_password" placeholder="Confirmpassword">

            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :disabled="form.processing">Register</button>
        </form>
        <p class="text-sm mt-4">Already have an account?<a class="text-blue-500 underline" href="/login"> login here</a></p>
    </div>

    <!--imagem-->
    <div class="sm:w-1/2 p-5">
        <img class=" rounded-2xl h-96" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp" alt=""
        >
    </div>
</div>
</div>
</template>