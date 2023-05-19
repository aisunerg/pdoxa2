<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import axios from 'axios';
    import { computed, onMounted, onUnmounted, ref } from 'vue';

    defineProps({
        status: {
            type: String,
            default: null
        },
    });

    onMounted(() => {        
        console.log('CARGADO')
    });
</script>

<template>
    <Head title="MiDashBoard"/>
    <Suspense>
        <MyLayout>
            <div class="bg"></div>
        </MyLayout>
    </Suspense>
    
</template>