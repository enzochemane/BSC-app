<script setup>
import { Link,Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>BSC</title>
    </Head>
    <div>
        <header class=" bg-black text-gray text-white">
            <nav class=" flex items-center justify-between p-6 max-w-screenn-lg
            mx-auto">
                <div class="space-x-6">
                    <Link :href="route('home')" class="hover:bg-gray-700 py-2 px-3 rounded-full" >Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('tickets')" class="hover:bg-gray-700 py-2 px-3 rounded-full">Tickets</Link>
                    <Link :href="route('logout')" method="post" as="button" class="hover:bg-gray-700 py-2 px-3 rounded-full">logout</Link>

                </div>  
                    
                
            </nav>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>

