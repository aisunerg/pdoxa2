<script setup>
    import HomeIcon from "@/Components/Icons/HomeIcon.vue";
    import DownArrow from "@/Components/Icons/DownArrow.vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import {Link, useRemember} from "@inertiajs/vue3";
    import {computed, ref, watch} from 'vue';
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
        classtypes: {
            type: Object,
            required: true
        },
   })
      
    const lvlSubjects = computed(() => {
        return props.subjects.sort((a,b) => a.level - b.level)
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

    var pen = ref(null);
    function grupo(lvl) {    
        if (pen == lvl) {
            return false
        }else{
            pen = lvl
            return true        
        }
    }

    let icon = ref('#e9d5ff')
    
    

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
                    <div class="py-1 px-3 flex flex-row items-center justify-between bg-purple-600 rounded-md text-purple-200 ">
                        <Link class="hover:text-white font-bold" :href="route('project.select', $page.props.sProject)">
                            <div class="text-xs truncate">
                                {{ $page.props.sProject.name }}
                            </div>
                        </Link>
                        
                        <Link class="hover:text-white font-sans border-l ml-2 pl-0.5 border-purple-200" :href="route('mydash')">
                            <div class="font-extrabold p-1 mr-2">
                                <svg class="w-6 h-6 fill-purple-200 hover:fill-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Icons" :fill="icon" viewBox="0 0 32 32" xml:space="preserve" style=".st0{fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}">
                                    
                                    <path class="st0" d="M14,11.8L14,11.8l0-4.6c0-0.9-1.1-1.3-1.7-0.7L4,14.8l8.3,8.3c0.6,0.6,1.7,0.2,1.7-0.7v-4.6h0  c5.3,0,9.8,3.7,11,8.8l0,0.2v-4C25,16.7,20.1,11.8,14,11.8z"/>
                                </svg>
                            </div>
                        </Link>
                    </div>
                </li> 
            </ul>
            <ul>
                <!-- Materias -->
                <li class="relative px-6 py-3">
                    <span class="select-none">Materias</span>
                    <Dropdown
                        align="left"
                        width=""
                        contentClasses=" bg-slate-200 max-h-44 overflow-y-auto w-56"
                    >
                        <template #trigger>
                            <div class="select-none text-sm text-black outline-black border border-purple-400 rounded-lg p-1 bg-slate-100 cursor-pointer">
                                <div v-if="aSubject == null">Seleccione</div>
                                <div v-else class="truncate">{{ aSubject.name }}</div>
                            </div>
                        </template>

                        <template #content>
                            <ul class="p-1 text-black text-sm">
                                <li v-for="subject in lvlSubjects" @click="aSubject = subject" class="">
                                    <div class="font-bold cursor-default" v-if="grupo(subject.level)">
                                        Semestre {{ subject.level }}
                                    </div>
                                    <div class="hover:bg-slate-300 cursor-pointer rounded-lg pl-2">{{subject.name  }}</div>
                                </li>
                                
                            </ul>

                        </template>
                    </Dropdown>
                
                </li>

                <!-- Secciones -->
                <li class="relative px-6 py-3">
                    <span class="select-none">Secciones</span>
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
                                <li v-else class="cursor-default"> Sin Secciones Asignadas</li>
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
                    <div class="select-none rounded-t-lg bg-purple-200 mb-1 px-2 pt-1 shadow-xl text-purple-950 text-sm">
                        <span class="font-medium block">{{aSection.subject.name}}</span>
                        <span class="font-medium block">{{"Seccion: "+aSection.name}}</span>
                    </div>
                    <div class=" rounded-lg bg-slate-200 space-y-2 py-3 px-1">
                        <div v-for="meeting in aMeetings">
                            <Card :meetsec="meeting.pivot.id" :meeting="meeting" :blocks="blocks" :section="aSection" :classtypes="classtypes" draggable="true" />
                        </div>
                    </div>
                </li>
                
          </ul>
        </div>
</aside>
</template>


<style>

</style>