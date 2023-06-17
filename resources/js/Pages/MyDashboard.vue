<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import axios from 'axios';
    import { computed, onMounted, onUnmounted, ref } from 'vue';

    defineProps({
        projects: {
            type: Object,
            default:null
        }
    })

    onMounted(() => {        
        console.log('CARGADO')
    });
</script>

<template>
    <Head title="MiDashBoard"/>
    <Suspense>
        <MyLayout :projects="projects">
            <div v-if="$page.props.flash.message" class="bg-green-300 w-full p-2 rounded-lg">
                {{ $page.props.flash.message }}
            </div>
        </MyLayout>
    </Suspense>
    
</template>