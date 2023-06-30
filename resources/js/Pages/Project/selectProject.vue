<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        project: {
            type: Object,
            default: null
        },
        pensum: {
            type: Object,
            default: null
        },
        cantSec: {
            type: Number,
            default: null
        },
        cantClass: {
            type: Number,
            default: null
        },
        freeBlocks: {
            type: Number,
            default: null
        },
        Blocks: {
            type: Number,
            default: null
        },

    });

    console.log(props.cantSec);
    console.log(props.cantClass);

</script>

<template>
  <Head title="MiDashBoard"/>
  <MyLayout :project="project">
    <template #header>
      <div class="" v-if="project" >
        Trabajando en {{ project.name }}
      </div>
    </template>
    <div class="border-b-2 border-black shadow-none mb-1"></div>
    <div class="flex flex-col bg-slate-100 p-3 rounded-lg">
      
      <div class="inline p-1">
        <span class="font-bold">Lapso Academico: </span>
        <div class="inline rounded-lg p-1">{{ project.academic_period }}</div>
      </div>
      
      <div class="inline p-1">
        <span class="font-bold">Fecha: </span>
        <div class="inline rounded-lg p-1">{{ project.date }}</div>
      </div>
      
      <div class="inline p-1">
        <span class="font-bold">Carrera: </span>
        <Link class="rounded-lg bg-purple-600 text-purple-200 hover:text-white p-1 select-none" :href="route('career.show', pensum.career)">{{ pensum.career.name }}</Link>
      </div>

      <div class="inline p-1">
        <span class="font-bold">Pensum: </span>
        <Link class="rounded-lg bg-purple-600 text-purple-200 hover:text-white p-1 select-none" :href="route('pensum.show', pensum)">{{ pensum.name }}</Link>
      </div>
            
      <div class="flex flex-row space-x-2 mt-2">          
        <div class="flex items-center p-2 bg-white rounded-lg shadow-xs w-1/5">
          <div class="p-2 mr-4 h-max-10 text-blue-500 bg-blue-100 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 48 48" style="fill:none;stroke:#3b82f6 ;stroke-linecap:round;stroke-linejoin:round;"><rect class="a" x="4.5" y="8.4" width="39" height="31.2" rx="2"/><rect class="a" x="8.5" y="12.4" width="31" height="23.2" rx="1"/><rect class="a" x="29.68" y="33.41" width="6.62" height="2.19"/><path class="a" d="M25.84,19a2.6,2.6,0,0,0-3.68,0l0,0a2.61,2.61,0,1,0,4.46,1.86A2.54,2.54,0,0,0,25.82,19Z"/><path class="a" d="M22,25.53h4a3,3,0,0,1,3,3v1.21a0,0,0,0,1,0,0H19a0,0,0,0,1,0,0V28.53A3,3,0,0,1,22,25.53Z"/><path class="a" d="M17.42,21.47a2,2,0,0,0-2.84,0l0,0A2,2,0,1,0,18,22.91a2,2,0,0,0-.6-1.43Z"/><path class="a" d="M19.34,27.14a2,2,0,0,0-1.47-.65H14.13a2,2,0,0,0-2,2v1.25H19"/><path class="a" d="M33.42,21.47a2,2,0,0,0-2.84,0l0,0A2,2,0,1,0,34,22.91a2,2,0,0,0-.6-1.43Z"/><path class="a" d="M29,29.74h6.86V28.49a2,2,0,0,0-2-2H30.13a2,2,0,0,0-1.47.65"/></svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Aulas:
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ cantClass }}
            </p>
          </div>
        </div>

        <div class="flex items-center p-2 bg-white rounded-lg shadow-xs w-1/5">
          <div class="p-4 mr-4 h-max-10 text-blue-500 bg-teal-100 rounded-full">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" viewBox="0 0 512 512" xml:space="preserve">
            <g>
              <path style="fill:#0d9488;" d="M81.44,116.972c23.206,0,42.007-18.817,42.007-42.008c0-23.215-18.801-42.016-42.007-42.016   c-23.216,0-42.016,18.801-42.016,42.016C39.424,98.155,58.224,116.972,81.44,116.972z"/>
              <path style="fill:#0d9488;" d="M224.166,245.037c0-0.856-0.142-1.673-0.251-2.498l62.748-45.541c3.942-2.867,4.83-8.411,1.963-12.362   c-1.664-2.285-4.342-3.652-7.17-3.652c-1.877,0-3.667,0.589-5.191,1.689l-62.874,45.636c-2.341-1.068-4.909-1.704-7.65-1.704   h-34.178l-8.294-47.222c-4.555-23.811-14.112-42.51-34.468-42.51h-86.3C22.146,136.873,0,159.019,0,179.383v141.203   c0,10.178,8.246,18.432,18.424,18.432c5.011,0,0,0,12.864,0l7.005,120.424c0,10.83,8.788,19.61,19.618,19.61   c8.12,0,28.398,0,39.227,0c10.83,0,19.61-8.78,19.61-19.61l9.204-238.53h0.463l5.27,23.269c1.744,11.097,11.293,19.28,22.524,19.28   h51.534C215.92,263.461,224.166,255.215,224.166,245.037z M68.026,218.861v-67.123h24.126v67.123l-12.817,15.118L68.026,218.861z"/>
              <polygon style="fill:#0d9488;" points="190.326,47.47 190.326,200.869 214.452,200.869 214.452,71.595 487.874,71.595 487.874,302.131    214.452,302.131 214.452,273.113 190.326,273.113 190.326,326.256 512,326.256 512,47.47  "/>
            </g>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Secciones:
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ cantSec }}
            </p>
          </div>
        </div>

        <div class="flex items-center p-2 bg-white rounded-lg shadow-xs w-1/5">
          <div class="p-4 mr-4 h-max-10 text-blue-500 bg-teal-100 rounded-full">
            <svg class="h-8 w-8 stroke-black fill-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="stroke-linecap:round;stroke-linejoin:round;">
              <path class="a" d="M8.0988,7.8588A1.9194,1.9194,0,0,0,6.1794,9.7782V41.5807A1.9193,1.9193,0,0,0,8.0988,43.5H39.9012a1.9193,1.9193,0,0,0,1.9194-1.9193V9.7782a1.9194,1.9194,0,0,0-1.9194-1.9194Z"/>
              <rect class="a" x="9.068" y="33.5427" width="7.4971" height="7.0782"/><rect class="a" x="20.2514" y="33.5427" width="7.4971" height="7.0782"/>
              <rect class="a" x="31.4349" y="33.5427" width="7.4971" height="7.0782"/><rect class="a" x="9.068" y="23.3351" width="7.4971" height="7.0782"/>
              <rect class="a" x="20.2514" y="23.3351" width="7.4971" height="7.0782"/><rect class="a" x="31.4349" y="23.3351" width="7.4971" height="7.0782"/>
              <rect class="a" x="31.4349" y="13.5974" width="7.4971" height="7.0782"/><line class="a" x1="12.8166" y1="10.258" x2="12.8166" y2="4.5"/>
              <line class="a" x1="35.1834" y1="10.258" x2="35.1834" y2="4.5"/>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Bloques:
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ freeBlocks+" / "+Blocks }}
            </p>
          </div>
        </div>
      </div>


    </div>      
  </MyLayout>
    
    
</template>