<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head, router, useForm } from '@inertiajs/vue3';
    import { selectObj, relaciona } from '@/utilidades';
    import DropdownX from '@/Components/DropdownX.vue';
    import formSection from '@/Pages/Section/formSection.vue';
    import updateSection from '@/Pages/Section/updateSection.vue';
    import FormDropdown from '@/Components/myComponents/formDropdown.vue';
    import myModal from '@/Components/myComponents/myModal.vue';
import { ref } from 'vue';
    

    const props = defineProps({
        sections: {
            type: Object,
            default: null
        },
        shifts: {
            type: Object,
            default: null
        },
        subjects: {
            type: Object,
            default: null
        },
        teachers: {
            type: Object,
            default: null
        },
        project: {
            type: Object,
            default: null
        },
    });

    let ordSections = props.sections.sort((a,b) => {
            var nombreA = a.subject.name.toUpperCase();
            var nombreB = b.subject.name.toUpperCase();

            if (nombreA < nombreB) {
                return -1;
            }
            if (nombreA > nombreB) {
                return 1;
            }

            // los nombres son iguales
            return 0;
        });

    let showEdit = ref(false);
    let secEdit = ref(null);
    /* Seleccionar seccion para editar y mostrar u ocultar modal */
    function editar(sec = null) {
        
        if(sec){
            showEdit.value = true;
            secEdit.value = sec;
        }else{
            showEdit.value = false;
        }
        return;
    }

    function eliminar(id) {
        router.delete(route('section.destroy', id));
    }
</script>

<template>
    <Head title="Proyectos"/>
    <Suspense>
        <MyLayout :project="project">
            <template #header>
                    <div class="">
                        Secciones del Proyecto {{ project.name }}
                    </div>
            </template>
        
            <div v-if="$page.props.flash.message" class="flex">
                <div class="border-4 p-0 border-red-300 bg-red-300 w-full rounded-l-lg">
                    <div class="w-full pl-2 bg-white rounded-lg py-1">
                        {{ $page.props.flash.message }}
                    </div>
                </div>
                <div @click="$page.props.flash.message = null" class="bg-red-300 h-full rounded-r-lg py-2 pr-2 pl-1 font-extrabold cursor-pointer">X</div>
            </div>

            <FormDropdown>
                <template #trigger>
                    Agregar Nueva Seccion
                </template>
                <template #content>
                    <formSection :shifts="shifts" :subjects="subjects" :project="project" :teachers="teachers"/>
                </template>
            </FormDropdown>

            <div class="w-full h-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto" style="height: 79.1%;">
                    <table class="w-full whitespace-no-wrap">
                        <thead class="sticky top-0">
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Seccion</th>
                                <th class="px-4 py-3">Materia</th>                                    
                                <th class="px-4 py-3">Profesor</th>
                                <th class="px-4 py-3">Cuota</th>                                    
                                <th class="px-4 py-3">Turno</th>                                    
                                <th class="px-4 py-3">Acciones</th> 
                                                        
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr v-for="section in ordSections" :key="section.id" class="text-gray-700 dark:text-gray-400">

                                <td class="px-4 py-3">
                                    <div class="text-sm">
                                        <p class="font-semibold">{{section.name}}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{ section.subject.name}}</p>
                                </td>
                                <td class="px-4 py-3" >
                                    <!-- {{relaciona(teachsecs, section.id, teachers)}} -->
                                    {{ section.teacher[0].name+" "+section.teacher[0].lastname }}
                                </td>
                                <td class="px-4 py-3">
                                        <p class="">{{section.quota}}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{selectObj(section.shift_id, shifts)}}</p>
                                </td>

                                

                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button @click="editar(section)" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        </button>
                                        <button @click="eliminar(section.id)" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>                    
                        </tbody>
                    </table>
                </div>                
            </div>    
        </MyLayout>
    </Suspense>

    <myModal :show="showEdit" @close="editar()">
        <updateSection :shifts="shifts" :subjects="subjects" :project="project" :teachers="teachers" :section="secEdit" />
    </myModal>
</template>