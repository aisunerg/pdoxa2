<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Head, Link, router, useForm } from '@inertiajs/vue3';
    import { relShiftHour } from '@/utilidades';
    import DropdownX from '@/Components/DropdownX.vue';
    import formHour from '@/Pages/Hour/formHour.vue';
    import Back from '@/Components/myComponents/Back.vue';
    

    const props = defineProps({
        schemehour:{
            type: Object,
            default:null
        },
        hours:{
            type: Object,
            default: null
        },
        shifts:{
            type: Object,
            default: null
        },
        hour_shifts:{
            type: Object,
            default: null
        },

    })

    function eliminar(id) {
        router.delete(route('hour.destroy', id));
    }
</script>

<template>
    <Head title="Esquemas de Dia"/>
        <Suspense>
            <MyLayout >
                <template #header>
                        <Back :href="route('schemehour.index')">volver</Back>
                        <div class="content-center">
                             Horas del Esquema: {{ schemehour.name }}
                        </div>
                </template>
                <div v-if="$page.props.flash.message" class="flex">
                    <div class="border-4 p-0 border-red-300 bg-red-300 w-full rounded-l-lg">
                        <div class="w-full pl-2 bg-white rounded-lg py-1">
                            {{ $page.props.flash.message }}
                        </div>
                    </div>
                    <div @click="$page.props.flash.message = null" class="bg-red-300 h-full rounded-r-lg pt-2 pr-2 pl-1 font-extrabold cursor-pointer">X</div>
                </div>
                <DropdownX
                        width="full"
                        contentClasses=" bg-slate-200 p-2"
                    >
                        <template #trigger>
                            <div class="w-full bg-slate-200 p-2">
                                Agregar Nueva Hora
                                <span class="font-bold">+</span>
                            </div>
                        </template>
                        <template #content>
                            <formHour :schemehour="schemehour" :shifts="shifts" />
                        </template>
                    </DropdownX>
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Numero</th>
                                    <th class="px-4 py-3">Inicio</th>
                                    <th class="px-4 py-3">Fin</th>
                                    <th class="px-4 py-3">Turno</th>
                                    <th class="px-4 py-3">Acciones</th> 
                                                          
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr  v-for="hour in hours" :key="hour.id" class="text-gray-700 dark:text-gray-400">

                                    <td class="px-4 py-3" >
                                        {{ hour.number }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <p class="font-semibold">{{ hour.start }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                        <p class="font-semibold">{{ hour.end }}</p>
                                    </td>
                                    <td class="px-4 py-3" >
                                        {{ relShiftHour(hour_shifts, hour.id, shifts) }}
                                    </td>
                                                                                                           

                                    <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        </button>
                                        <button @click="eliminar(hour.id)" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
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
    
    
</template>