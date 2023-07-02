<script setup>
    import HomeIcon from "@/Components/Icons/HomeIcon.vue";
    import DownArrow from "@/Components/Icons/DownArrow.vue";
    import DropdownX from "@/Components/DropdownX.vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import {router, Link} from "@inertiajs/vue3";
    import {ref} from 'vue';

    defineProps({
        project: {
            type: Object,
            default: null
        },
        projects: {
            type: Object,
            default: null
        }
   });
    
</script>

<template>
    <aside class="z-20 hidden w-56 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <Link
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                :href="route('mydash')"
            >
            pDoxa
            </Link>
            
            <ul v-if="$page.props.sProject" class="mt-6">
                <li  class="relative px-2 py-3">
                    <div class="py-1 px-3 flex flex-row items-center justify-between bg-purple-600 rounded-md text-purple-200 ">
                        <Link class="hover:text-white font-bold" :href="route('project.select', $page.props.sProject)">
                            <div class="text-xs truncate">
                                {{ $page.props.sProject.name }}
                            </div>
                        </Link>
                        
                        <Link class="hover:text-white font-sans border-l ml-2 pl-0.5 border-purple-200" :href="route('mydash')">
                            <div class="font-extrabold p-1 mr-2">
                                <svg class="w-6 h-6 fill-purple-200 hover:fill-white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Icons" fill="icon" viewBox="0 0 32 32" xml:space="preserve" style=".st0{fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}">
                                    
                                    <path class="st0" d="M14,11.8L14,11.8l0-4.6c0-0.9-1.1-1.3-1.7-0.7L4,14.8l8.3,8.3c0.6,0.6,1.7,0.2,1.7-0.7v-4.6h0  c5.3,0,9.8,3.7,11,8.8l0,0.2v-4C25,16.7,20.1,11.8,14,11.8z"/>
                                </svg>
                            </div>
                        </Link>
                    </div>
                </li> 
            </ul>
            <ul v-if="!$page.props.sProject" class="mt-6 "> 
                <li class="relative px-2 py-3">
                    <li  class="transition-colors duration-150 hover:text-black ">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>           
                        <!-- Elejir Proyecto -->
                        <DropdownX
                        width="full"
                        contentClasses="w-4/5 bg-slate-100 ml-2 p-1"
                        >
                            <template #trigger>
                                <div class="flex flex-row justify-between">
                                    <div class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                            <path d="M8.77502 6.75C9.18924 6.75 9.52502 6.41421 9.52502 6C9.52502 5.58579 9.18924 5.25 8.77502 5.25V6.75ZM14.625 5.25C14.2108 5.25 13.875 5.58579 13.875 6C13.875 6.41421 14.2108 6.75 14.625 6.75V5.25ZM8.77502 5.25C8.36081 5.25 8.02502 5.58579 8.02502 6C8.02502 6.41421 8.36081 6.75 8.77502 6.75V5.25ZM14.625 6.75C15.0392 6.75 15.375 6.41421 15.375 6C15.375 5.58579 15.0392 5.25 14.625 5.25V6.75ZM9.52502 6C9.52502 5.58579 9.18924 5.25 8.77502 5.25C8.36081 5.25 8.02502 5.58579 8.02502 6H9.52502ZM8.02502 7C8.02502 7.41421 8.36081 7.75 8.77502 7.75C9.18924 7.75 9.52502 7.41421 9.52502 7H8.02502ZM8.02502 6C8.02502 6.41421 8.36081 6.75 8.77502 6.75C9.18924 6.75 9.52502 6.41421 9.52502 6H8.02502ZM9.52502 4C9.52502 3.58579 9.18924 3.25 8.77502 3.25C8.36081 3.25 8.02502 3.58579 8.02502 4H9.52502ZM15.375 6C15.375 5.58579 15.0392 5.25 14.625 5.25C14.2108 5.25 13.875 5.58579 13.875 6H15.375ZM13.875 7C13.875 7.41421 14.2108 7.75 14.625 7.75C15.0392 7.75 15.375 7.41421 15.375 7H13.875ZM13.875 6C13.875 6.41421 14.2108 6.75 14.625 6.75C15.0392 6.75 15.375 6.41421 15.375 6H13.875ZM15.375 4C15.375 3.58579 15.0392 3.25 14.625 3.25C14.2108 3.25 13.875 3.58579 13.875 4H15.375ZM8.77502 5.25C6.18911 5.25 4.12502 7.39466 4.12502 10H5.62502C5.62502 8.18706 7.05311 6.75 8.77502 6.75V5.25ZM4.12502 10V16H5.62502V10H4.12502ZM4.12502 16C4.12502 18.6053 6.18911 20.75 8.77502 20.75V19.25C7.05311 19.25 5.62502 17.8129 5.62502 16H4.12502ZM8.77502 20.75H14.625V19.25H8.77502V20.75ZM14.625 20.75C17.2109 20.75 19.275 18.6053 19.275 16H17.775C17.775 17.8129 16.3469 19.25 14.625 19.25V20.75ZM19.275 16V10H17.775V16H19.275ZM19.275 10C19.275 7.39466 17.2109 5.25 14.625 5.25V6.75C16.3469 6.75 17.775 8.18706 17.775 10H19.275ZM8.77502 6.75H14.625V5.25L8.77502 5.25V6.75ZM8.02502 6V7H9.52502V6H8.02502ZM9.52502 6V4H8.02502V6H9.52502ZM13.875 6V7H15.375V6H13.875ZM15.375 6V4H13.875V6H15.375Z" fill="#000000"/>
                                            <path d="M7.79999 13L9.74999 16L15.6 11" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <button class="ml-3">Elegir Proyecto</button>
                                    </div>
                                    <div>
                                        <DownArrow />
                                    </div>
                                </div>
                            </template>

                            <template  #content>
                                <Link v-for="project in projects" :key="project.id" :href="route('project.select', project)">
                                    <div class="block p-1 text-sm font-semibold transition-colors duration-150 text-gray-600 hover:bg-slate-200 cursor-pointer rounded-lg hover:text-purple-600" >
                                        {{project.name}}
                                    </div>
                                </Link>
                            </template>
                        </DropdownX>
                    </li>
                </li>
                           
                <li  class="relative px-2 py-3">
                    <!-- Proyecto -->
                    <DropdownX>
                        <template #trigger>
                            <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                    </svg>

                                    <span class="ml-4">Proyectos</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </template>
                        <template #content>
                            
                            <ul class="p-2  space-y-2 overflow-hidden text-sm font-medium text-gray-600 rounded-md shadow-inner bg-gray-200 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                                
                                
                                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <Link class="w-full" :href="route('project.index')">
                                        Proyectos
                                    </Link>
                                </li>                           
                                <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <Link class="w-full" :href="route('project.create')">
                                        Crear Proyecto
                                    </Link>
                                </li>                           
                            </ul>
                        </template>
                    </DropdownX>
                    
                </li>
            </ul>
            <ul v-if="$page.props.sProject" class="">
                <div class="w-11/12 border-t-2 border-slate-200 px-4 mx-2"></div>
                <!-- Aulas -->
                <li  class="relative px-6 py-3">
                    <Link :href="route('project.classroom.index', $page.props.sProject)" >
                        <button
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                            ></path>
                            </svg>
                            <span class="ml-4">Aulas</span>
                        </button>
                    </Link>
                </li>
                <!-- Secciones -->
                <li  class="relative px-6 py-3">
                    <Link :href="route('project.section.index', $page.props.sProject)">
                        <button
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="cards.html"
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
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            ></path>
                            </svg>
                            <span class="ml-4">Secciones</span>
                        </button>
                    </Link>
                </li>
                <!-- Mestro de Aula -->
                <li  class="relative px-6 py-3">
                    <Link :href="route('master.view')">
                        <button
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            ></path>
                            </svg>
                            <span class="ml-4">Maestro de Aula</span>
                        </button>
                    </Link>
                </li>
                <div class="w-11/12 border-t-2 border-slate-200 px-4 mx-2"></div>
            </ul>
            <ul v-if="$page.props.sProject" class="">
                <!-- <div class="w-11/12 border-t-2 border-slate-200 px-4 mx-2"></div> -->
                <!-- Ver Horarios -->
                <li  class="relative px-6 py-3">
                    <Link :href="route('project.horary')" >
                        <button
                            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                ></path>
                            </svg>
                            <span class="ml-4">Ver Horarios</span>
                        </button>
                    </Link>
                </li>
                
                <div class="w-11/12 border-t-2 border-slate-200 px-4 mx-2"></div>
            </ul>
            <ul>
                

                <!-- Opciones -->
                <li class="relative px-6 py-3">
                    <DropdownX>
                        <template #trigger>
                            <button
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
                                <span class="ml-4">Opciones</span>
                            </button>
                        </template>
                        <template #content>
                            <ul>
                                <li class="relative px-6 py-3">
                                    <DropdownX>
                                        <template #trigger>
                                            <button
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
                                                <span class="ml-4">Pensum</span>
                                            </button>
                                        </template>
                                        <template #content>
                                            <ul class="flex flex-col">
                                                <Link class=" hover:text-black" :href="route('pensum.create')">Crear Pensum</Link>
                                                <Link class=" hover:text-black" :href="route('pensum.index')">Pensums</Link>
                                            </ul>
                                        </template>
                                    </DropdownX>
                                
                                </li>
                                <li class="relative px-6 py-3">
                                    <DropdownX>
                                        <template #trigger>
                                            <button
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
                                                <span class="ml-4">Carerras</span>
                                            </button>
                                        </template>
                                        <template #content>
                                            <div class="flex flex-col">
                                                <Link class="hover:text-black" :href="route('career.create')">Crear Carrera</Link>
                                                <Link class="hover:text-black" :href="route('career.index')">Carreras</Link>
                                            </div>
                                        </template>
                                    </DropdownX>
                                </li>
                                <li class="relative px-6 py-3">
                                <Link
                                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    :href="route('teacher.index')"
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
                                    <span class="ml-4">Profesores</span>
                                </Link>
                                </li>
                                <li class="relative px-6 py-3">
                                <Link
                                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    :href="route('adress.index')"
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
                                    <span class="ml-4">Direcciones</span>
                                </Link>
                                </li>
                                <li class="relative px-6 py-3">
                                <Link
                                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    :href="route('departament.index')"
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
                                    <span class="ml-4">Departamentos</span>
                                </Link>
                                </li>
                                <li class="relative px-6 py-3">
                                <Link
                                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    :href="route('subject.index')"
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
                                    <span class="ml-4">Materias</span>
                                </Link>
                                </li>                                
                            </ul>
                        </template>
                    </DropdownX>
                </li>    
                
                <!-- Opciones Generales -->
                <li class="relative px-6 py-3">
                    <DropdownX>
                        <template #trigger>
                            <button
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
                                <span class="ml-4">Opciones Generales</span>
                            </button>
                        </template>
                        <template #content>
                            <ul>
                                <!-- Esquema de Dias -->
                                <li class="relative px-6 py-3">
                                    <Link
                                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                        :href="route('schemeday.index')"
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
                                        <span class="ml-4">Esquema de Dia</span>
                                    </Link> 
                                </li>
                                <!-- Esquema de Horas -->
                                <li class="relative px-6 py-3">
                                    <Link
                                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                        :href="route('schemehour.index')"
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
                                        <span class="ml-4">Esquema de Horas</span>
                                    </Link> 
                                </li>                          
                                <!-- Area -->
                                <li class="relative px-6 py-3">
                                    <DropdownX>
                                        <template #trigger>
                                            <button
                                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                                                <span class="ml-4">Area</span>
                                            </button>
                                        </template>
                                        <template #content>
                                            <div class="flex flex-col">
                                                <Link class="hover:text-black" :href="route('area.create')">Crear Area</Link>
                                                <Link class="hover:text-black" :href="route('area.index')">Area</Link>
                                            </div>
                                        </template>
                                    </DropdownX>
                                </li>
                                <!-- Turnos -->
                                <li class="relative px-6 py-3">
                                <Link
                                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    :href="route('shift.index')"
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
                                    <span class="ml-4">Turnos</span>
                                </Link>
                                </li>
                                <!-- Ubicacion -->
                                <li class="relative px-6 py-3">
                                    <Link
                                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                        :href="route('ubication.index')"
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
                                        <span class="ml-4">Ubicaciones</span>
                                    </Link>
                                </li>
                                <!-- Tipos de Aula -->
                                <li class="relative px-6 py-3">
                                    <Link
                                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                        :href="route('classroom_type.index')"
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
                                        <span class="ml-4">Tipos de Aula</span>
                                    </Link>
                                </li>
                                
                                
                            </ul>
                        </template>
                    </DropdownX>
                </li>
          </ul>
        </div>
</aside>
</template>
