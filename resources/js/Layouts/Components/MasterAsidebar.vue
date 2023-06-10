<script setup>
    import HomeIcon from "@/Components/Icons/HomeIcon.vue";
    import DownArrow from "@/Components/Icons/DownArrow.vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import {Link, useRemember} from "@inertiajs/vue3";
    import {ref} from 'vue';
import Card from "@/Components/myComponents/Card.vue";

   const props = defineProps({
        subjects: {
            type: Object
        },
        sections: {
            type: Object
        },
        sec_met: {
            type: Object
        },
        meetings: {
            type: Object
        },
   })
      
   let aSubject = ref(null);
   let aSection = ref(null);

   const utilSection = (subject, section) => {
        let selSection = section.filter(function (e) {
            return e.subject_id == subject.id
        });
        return selSection;
   }


   const utilMeeting = (secmeet_id, meetings) => {
        let meet = meetings.find(e => e.id == secmeet_id)
        return meet;
   }

   const utilSecMeet = (section, sec_met) => {
        let meets = sec_met.filter(function (e) {
            return e.section_id == section.id;
        })
        return meets;
   }
//    const utilMeetings = (section, sec_met, meetings) => {
//         secmet = sec_met.filter(function (e) {
//             return e.section_id = section.id; 
//         })
//         let selMeetings = [];
//         secmet.forEach(secmet => {
//             meeting = meetings.find(meeting => meeting.id == secmet.id );
//             selMeetings.push(meeting);
//         });
//         return selMeetings;
//    }

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
                    <Link class="p-1 flex flex-row items-center justify-between bg-blue-400 rounded-md text-white " :href="route('mydash')">
                        <div class="text-xs">
                            sss
                        </div>
                        <div class="font-bold p-1 mr-2">X</div>
                    </Link>
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
                                <li v-for="subject in subjects" @click="aSubject = subject, aSection = null" class="hover:bg-slate-300 cursor-pointer">
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
                                <div v-if="aSection == null">Seleccione</div>
                                <div v-else class="truncate">{{ aSection.name }}</div>
                            </div>
                        </template>

                        <template #content>
                            <ul class="p-1 text-black text-sm">
                                <li v-if="aSubject != null" v-for="section in utilSection(aSubject, sections)" @click="aSection = section" class="hover:bg-slate-300 cursor-pointer">
                                    <span>{{ section.name }}</span>
                                </li>
                                <li v-else>
                                    Selecciona una Seccion
                                </li>
                            </ul>

                        </template>
                    </Dropdown>
                </li>

                <!-- Encuentros -->
                <li v-if="aSection" class="relative px-6 py-3">
                    <span>Encuentros</span>
                    <div class=" rounded-lg bg-slate-200">
                        <div v-for="secmeet in utilSecMeet(aSection, sec_met)">
                            <Card :id="secmeet.id" :meeting="utilMeeting(secmeet.meeting_id, meetings)" draggable="true">
                                Horas: {{ utilMeeting(secmeet.meeting_id, meetings).hour_amount }}
                            </Card>
                        </div>
                    </div>
                
                </li>
                
                <!-- <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="charts.html"
                >
                    <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                    ></path>
                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="ml-4">Charts</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="buttons.html"
                >
                    <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                    ></path>
                    </svg>
                    <span class="ml-4">Buttons</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="modals.html"
                >
                    <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path
                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                    ></path>
                    </svg>
                    <span class="ml-4">Modals</span>
                </a>
                </li>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="tables.html"
                >
                    <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    >
                    <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Tables</span>
                </a>
                </li> -->
          </ul>
        </div>
</aside>
</template>


<style>

</style>