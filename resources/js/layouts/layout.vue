<script setup>
import { Link,Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

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
              <!----      <Link :href="route('home')" class="hover:bg-gray-700 py-2 px-3 rounded-full" >Home</Link> -->
                    <a href="#">
        <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/logo.svg" alt="">
                    </a>
                </div>
                <div class="space-x-6">
                   
                    <Link> {{ $page.props.auth.user.email }}</Link>

                    <Link 
                    :href="route('tickets')"
                    class="hover:bg-gray-700 py-2 px-3 rounded-full">Tickets
                    </Link>
                   
                   
                    <Link
                    :href="route('request.index')"
                    class="hover:bg-gray-700 py-2 px-3 rounded-full">
                    Request
                    </Link>

                    <!-- hide if not admin ya 
                    <Link
                    v-else
                    class="hidden"
                    
                    Hidden
                    </Link>-->

                    <Link :href="route('logout')" method="post" as="button" class="hover:bg-gray-700 py-2 px-3 rounded-full">logout</Link>

                </div>  
                    
                
            </nav>
        </header>
        <main>
            <slot></slot>
        </main>
    </div>
</template>

