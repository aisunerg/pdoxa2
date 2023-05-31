<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';

    defineProps({
        project: {
            type: Object,
            default: null
        },
    });
</script>

<template>
  <Head title="MiDashBoard"/>
  <Suspense>
    <MyLayout :project="project">
      <template #header>
          <div class="" v-if="project">
            Trabajando en {{ project.name }}
          </div>
      </template>      
    </MyLayout>
  </Suspense>
    
    
</template>