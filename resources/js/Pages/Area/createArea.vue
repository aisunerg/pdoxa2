<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import { computed, onMounted, onUnmounted, ref } from 'vue';
    import formArea from '@/Pages/Area/formArea.vue';

</script>

<template>
    <Head title="Crear Area"/>
    <Suspense>
        <MyLayout>
            <template #header>
                Crear Area
            </template>
            <formArea />
        </MyLayout>
    </Suspense>
    
</template>