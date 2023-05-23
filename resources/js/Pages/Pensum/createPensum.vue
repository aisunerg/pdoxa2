<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed, onMounted, onUnmounted, ref } from 'vue';
import formPensum from '@/Pages/Pensum/formPensum.vue';

    

    onMounted(() => {        
        console.log('CARGADO')
    });
</script>

<template>
    <Head title="Crear Pensum"/>
    <Suspense>
        <MyLayout>
            <template #header>
                Crear Pensum
            </template>
            <formPensum />
        </MyLayout>
    </Suspense>
    
</template>