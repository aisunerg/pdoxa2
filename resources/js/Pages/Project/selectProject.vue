<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head } from '@inertiajs/vue3';

    defineProps({
        LoadProject: {
            type: Object,
            default: null
        },
    });
</script>

<template>
  <Head title="MiDashBoard"/>
  <Suspense>
    <MyLayout :SelectProject="LoadProject">
      <template #header>
          <div class="" v-if="LoadProject">
            Trabajando en {{ LoadProject.name }}
          </div>
      </template>      
    </MyLayout>
  </Suspense>
    
    
</template>