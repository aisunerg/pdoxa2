<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import axios from 'axios';
    import { computed, onMounted, onUnmounted, ref } from 'vue';

    

    onMounted(() => {        
        console.log('CARGADO')
    });
</script>

<template>
    <Head title="MiDashBoard"/>
    <Suspense>
        <MyLayout>
            <template #header>
                Crear Proyecto
            </template>
            
        </MyLayout>
    </Suspense>
    
</template>