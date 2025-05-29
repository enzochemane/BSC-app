
<script setup>
import layout from '../layouts/layout.vue';

defineOptions({layout: layout});
</script>

<template>
   <h1>
    Home page 
  </h1>
  <p>welcome {{ $page.props.auth.user.name }}</p>
  

</template>
