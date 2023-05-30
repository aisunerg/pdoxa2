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
        }
   })

    const cod = await axios.get(route('indexProject'));


    function redirect(cods) {
        router.post(route('project.select', cods))
    }
    
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
            <ul class="mt-6"> 
                <li v-if="project" class="relative px-2 py-3">
                    <Link class="p-1 flex flex-row items-center justify-between bg-blue-400 rounded-md text-white " :href="route('mydash')">
                        <div class="text-xs">
                            {{ project.name }}
                        </div>
                        <div class="font-bold p-1 mr-2">X</div>
                    </Link>
                </li>           
                <li class="relative px-2 py-3">
                    <!-- Proyecto -->
                    <DropdownX>
                        <template #trigger>
                            <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                                    </svg>

                                    <span class="ml-4">Proyecto</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </template>
                        <template #content>
                            
                            <ul class="p-2  space-y-2 overflow-hidden text-sm font-medium text-gray-600 rounded-md shadow-inner bg-gray-200 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
                                
                                <li v-if="!project" class="px-2 py-1 transition-colors duration-150 hover:text-black dark:hover:text-gray-200">
                                    
                                    <DropdownX 
                                    contentClasses="w-4/5 bg-white ml-2 p-1"
                                    >
                                        <template #trigger>
                                            <div class="flex flex-row justify-between">
                                                <div>
                                                    <button>Elegir Proyecto</button>
                                                </div>
                                                <div>
                                                    <DownArrow />
                                                </div>
                                            </div>
                                        </template>
                                        <template  #content>
                                            <div class="block transition-colors duration-150 text-gray-600 hover:text-black" v-for="cods in cod.data" :key="cods.id">
                                                <!-- <button @click="select(cods.id)">{{ cods.name }} </button> -->
                                                <Link :href="route('project.select', cods)">{{cods.name}}</Link>
                                            </div>
                                        </template>
                                    </DropdownX>
                                </li>
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
            <ul>
                <li v-if="project" class="relative px-6 py-3">
                    <!-- Aulas -->
                    <DropdownX>
                        <template #trigger>
                            <button
                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="forms.html"
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
                                <span class="ml-4">Aula</span>
                            </button>
                        </template>

                        <template #content>
                            <ul>
                                <li>Crear Aula</li>
                                <li>Lista de Aulas</li>
                            </ul>

                        </template>
                    </DropdownX>
                
                </li>
                <li v-if="project" class="relative px-6 py-3">
                    <!-- Secciones -->
                    <DropdownX >
                        <template #trigger>
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
                                <span class="ml-4">Seccion</span>
                            </button>
                        </template>

                        <template #content>
                            <ul>
                                <li>Crear Aula</li>
                                <li>Lista de Aulas</li>
                            </ul>
                        </template>
                    </DropdownX>
                </li>
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
          </ul>
        </div>
</aside>
</template>
