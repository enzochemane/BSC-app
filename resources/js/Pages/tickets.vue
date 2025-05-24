
<template>
   
    <p> Tickets page {{ user }}</p>
    
</template>

<script setup>
import layout from'../layouts/layout.vue';

defineOptions({layout: layout});
defineProps({
    user: String
})

</script>