<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed, onMounted, onUnmounted, ref } from 'vue';
    import formCareer from '@/Pages/Career/formCareer.vue';

    

    onMounted(() => {        
        console.log('CARGADO')
    });
</script>

<template>
    <Head title="Crear Carrera"/>
    <Suspense>
        <MyLayout>
            <template #header>
                Crear Carerra
            </template>
            <formCareer />
        </MyLayout>
    </Suspense>
    
</template>