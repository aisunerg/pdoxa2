<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import axios from 'axios';
    import { computed, onMounted, onUnmounted, ref } from 'vue';
import formProject from '@/Pages/Project/formProject.vue';

    

    onMounted(() => {        
        console.log('CARGADO')
    });
</script>

<template>
    <Head title="Crear Proyecto"/>
    <Suspense>
        <MyLayout>
            <template #header>
                Crear Proyecto
            </template>
            <formProject />
        </MyLayout>
    </Suspense>
    
</template>