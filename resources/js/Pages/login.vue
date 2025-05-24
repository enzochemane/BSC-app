<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';

</script>

<template>
<div class="bg-gray-50 min-h-screen flex  items-center justify-center">
    <!--conteiner do login-->
<div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5">

    <!--formulario-->
    <div class=" sm:w-1/2 px-16">
        <h2 class="font-bold text-2xl">Login</h2>
        <p class="text-sm mt-4">if you already registed, easly log in</p>
        
        <form action="" class="flex flex-col">
            
            <input class="border p-2 my-2 rounded gap-4 mt-8" type="text" name="email" placeholder="email">
            <input class="p-2 border my-2 rounded" type="text" name="password" placeholder="password">
        
            <button class="bg-gray-900 text-white p-2 my-2 rounded hover:bg-gray-700" :href="route('home')">Login</button>
        </form>
        <div class="mt-5 grid grid-cols-3 items-center text-gray-500">

            <hr class="border-gray-400">
            <p class="text-center">OR</p>
            <hr class="border-gray-400">
        </div>
       <Link :href="route('register')"><button  class="bg-gray-900 text-white p-2 my-2 rounded px-23 hover:bg-gray-700">Register</button></Link>
    </div>

    <!--imagem-->
    <div class="sm:w-1/2 p-5">
        <img class=" rounded-2xl h-96" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp" alt=""
        >
    </div>
</div>
</div>
</template>