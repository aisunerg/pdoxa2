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
        let selSections = props.sections.filter(function (e) {
                return e.subject_id == newValue.id
            });
        aSection.value = null;
        aSections = selSections;
    })

   watch(aSection, (newValue, oldValue) => {
        if (newValue != null) {
            aMeetings = newValue.meetings;
        }

    })


    

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
                            <Card :meetsec="meeting.pivot.id" :meeting="meeting" :blocks="blocks" :section="aSection" draggable="true" />
                        </div>
                    </div>
                </li>
                
          </ul>
        </div>
</aside>
</template>


<style>

</style>