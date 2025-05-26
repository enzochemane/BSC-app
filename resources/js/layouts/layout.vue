<script setup>
import { Link,Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>BSC</title>
    </Head>
    <div>
        <header class=" bg-black text-gray text-white">
            <nav class=" flex items-center justify-between p-4 max-w-screenn-lg
            mx-auto">
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('tickets')">Tickets</Link>
                </div>  
                    
                
            </nav>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>

