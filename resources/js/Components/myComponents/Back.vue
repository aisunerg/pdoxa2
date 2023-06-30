<script setup>
    import { Link } from '@inertiajs/vue3';
    import { computed, defineComponent } from 'vue';

    const props = defineProps({
        href:{
            type: String,
            default: null
        }
    });

    const active = computed(() => {
        if (props.href == route('mydash')) {
            return 'hidden'
        }
    })


</script>

<template>
    <Link 
        :href="href" 
        class="text-sm bg-purple-400 hover:bg-purple-600 text-white rounded-xl p-1 pt-1 mr-1 cursor-pointer"  
        :class="active"
    >
        <slot />
    </Link>  
    
</template>

<style>

</style>
