<script setup>
import { Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

defineProps({
    href:{
        type: String,
        default: null
    }
})


</script>

<template>
    <Link :href="href" class="text-sm bg-purple-400 text-white rounded-xl p-1 pt-1 mr-1"  >
        <slot />
    </Link>  
    
</template>

<style>

</style>
