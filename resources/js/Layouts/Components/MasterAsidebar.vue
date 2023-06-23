<script setup>
    import HomeIcon from "@/Components/Icons/HomeIcon.vue";
    import DownArrow from "@/Components/Icons/DownArrow.vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import {Link, useRemember} from "@inertiajs/vue3";
    import {ref, watch} from 'vue';
import Card from "@/Components/myComponents/Card.vue";

   const props = defineProps({
        subjects: {
            type: Object
        },
        sections: {
            type: Object
        },
        blocks: {
            type: Object
        },
        project: {
            type: Object,
            required: true
        },
   })
      
   let aSubject = ref(null);
   let aSection = ref(null);
   let aSections = ref(null);
   let aMeetings;

   watch(aSubject, (newValue, oldValue) => {
        // Aquí puedes ejecutar el código que necesites
        let selSections = props.sections.filter(function (e) {
                return e.subject_id == newValue.id
            });
        aSection.value = null;
        aSections = selSections;
    })

   watch(aSection, (newValue, oldValue) => {
        // Aquí puedes ejecutar el código que necesites
        console.log('la seccion cambio Nuevo: '+newValue+" Viejo: "+oldValue);
        if (newValue != null) {
            console.log(newValue.meetings);
            aMeetings = newValue.meetings;
        }
    })

    let selBlocks = ref(null);

    function asignado(secmeet_id){
        console.log('Asignado');

        let asigna = props.blocks.filter(function (e) {
            return e.meeting_section_id == secmeet_id;
        });

        if (asigna.length == 0) {
            console.log('Libre');
            return false;
        }else{
            selBlocks.value = asigna;
            return true;
        }
        
   }

</script>

<template>
    <aside class="z-20 hidden w-56 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
            >
            pDoxa
            </a>
            <ul class="mt-6">
                <li  class="relative px-2 py-3">
                    <div class="p-1 flex flex-row items-center justify-between bg-blue-400 rounded-md text-white ">
                        <Link class="hover:font-semibold " :href="route('project.select', project)">
                            <div class="text-xs truncate">
                                {{ project.name }}
                            </div>
                        </Link>
                        <Link class="hover:text-red-600" :href="route('mydash')">
                            <div class="font-bold p-1 mr-2">X</div>
                        </Link>
                    </div>
                </li>                
                
            </ul>
            <ul>
                <!-- Materias -->
                <li class="relative px-6 py-3">
                    <span>Materias</span>
                    <Dropdown
                        align="left"
                        contentClasses=" bg-slate-100 max-h-44 overflow-auto"
                    >
                        <template #trigger>
                            <div class="text-sm text-black outline-black border border-purple-400 rounded-lg p-1 bg-slate-100 cursor-pointer">
                                <div v-if="aSubject == null">Seleccione</div>
                                <div v-else class="truncate">{{ aSubject.name }}</div>
                            </div>
                        </template>

                        <template #content>
                            <ul class="p-1 text-black text-sm">
                                <li v-for="subject in subjects" @click="aSubject = subject" class="hover:bg-slate-300 cursor-pointer">
                                    {{ subject.name }}
                                </li>
                                
                            </ul>

                        </template>
                    </Dropdown>
                
                </li>

                <!-- Secciones -->
                <li class="relative px-6 py-3">
                    <span>Secciones</span>
                    <Dropdown
                        align="left"
                        contentClasses=" bg-slate-100 max-h-44 overflow-auto"
                    >
                        <template #trigger>
                            <div class="text-sm text-black outline-black border border-purple-400 rounded-lg p-1 bg-slate-100 cursor-pointer">
                                <div v-if="aSubject == null">Seleccione una materia</div>
                                <div v-else-if="aSection == null">Seleccione</div>
                                <div v-else class="truncate">{{ aSection.name }}</div>
                            </div>
                        </template>

                        <template #content>
                            <ul v-if="aSubject != null" class="p-1 text-black text-sm">
                                <li  
                                    v-if="aSections.length > 0" 
                                    v-for="section in aSections" 
                                    @click="aSection = section"
                                    class="hover:bg-slate-300 cursor-pointer"
                                >
                                    <span>
                                        {{ section.name }}
                                    </span>
                                </li>
                                <li v-else> Sin Secciones Asignadas</li>
                            </ul>
                            <ul v-else class="text-sm p-1 text-black">
                                Debe seleccionar una materia
                            </ul>

                        </template>
                    </Dropdown>
                </li>

                <!-- Encuentros -->
                <li v-if="aSection == null" class="relative px-2 py-3">
                </li>
                <li class=" mx-2 outline outline-1 outline-purple-400 bg-slate-200 rounded-md" v-else>
                    <div class="rounded-t-lg bg-purple-200 mb-1 px-2 pt-1 shadow-xl text-purple-950 text-sm">
                        <span class="font-medium block">{{aSection.subject.name}}</span>
                        <span class="font-medium block">{{"Seccion: "+aSection.name}}</span>
                    </div>
                    <div class=" rounded-lg bg-slate-200 space-y-2 py-3 px-1">
                        <div v-for="meeting in aMeetings">
                            <Card :id="meeting.pivot.id" :meeting="meeting" draggable="true">
                                <!-- ASIGNADO -->
                                <div v-if="asignado(meeting.pivot.id)" class="text-sm text-black text-end flex">
                                    <div class="ml-1">
                                        <svg class="h-3 w-3 inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector" d="M12 21V12M12 21L15 18M12 21L9 18M12 12V3M12 12H3M12 12H21M12 3L9 6M12 3L15 6M3 12L6 15M3 12L6 9M21 12L18 9M21 12L18 15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="font-medium text-sm p-0.5 h-max-1/2 h-1/2 w-full flex flex-col justify-between">
                                        <div class="text-start w-full">{{'Aula: '+selBlocks[0].classrooms.name}}</div>
                                        <div class="text-start">{{selBlocks[0].day.name+": "+selBlocks[0].hour.start.slice(0, 5)+" a "+selBlocks[selBlocks.length - 1].hour.end.slice(0, 5)}}</div>
                                    </div>  
                                </div>

                                <!-- LIBRE -->
                                <div v-else class="text-sm text-black text-end flex p-1">
                                    <div class="">
                                        <svg class="h-4 w-4 inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector" d="M12 21V12M12 21L15 18M12 21L9 18M12 12V3M12 12H3M12 12H21M12 3L9 6M12 3L15 6M3 12L6 15M3 12L6 9M21 12L18 9M21 12L18 15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="font-medium px-1 h-max-10 h-10 w-full flex justify-between">
                                        <div class="text-start w-full">{{aSection.subject.name}}</div>
                                        <div class="py-2 text-md">{{" "+meeting.hour_amount+"h"}}</div>
                                    </div>
                                </div>
                            </Card>
                        </div>
                    </div>
                </li>
                
          </ul>
        </div>
</aside>
</template>


<style>

</style>