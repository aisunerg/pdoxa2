<script setup>
import Block from '@/Components/myComponents/Block.vue';
import Trash from '@/Components/myComponents/Trash.vue';
import { ref, watch } from 'vue';


    const props = defineProps({
        days:{
            type: Object,
            default: null
        },
        hours:{
            type: Object,
            default: null
        },
        classroom:{
            type: Object,
            default: null
        },
        blocks:{
            type: Object,
            default: null
        },
        sections:{
            type: Object,
            default: null
        },
        selectC:{
            type: Number,
            default: null
        }
    });

    const form = {
        classroom: props.classroom,
        day: props.day,
        hour: props.hour
    } 

    let aSection = ref(null);
    let aBlock = ref(null);
    let oldB = null;
    let type = null;
    let limit = null;

    //retorna el bloque que coincida con el dia y la hora ingresados
    let block = function (aClassroom, aDay, aHour){        
        
        aBlock = props.blocks.find(b =>{return b.classroom_id == aClassroom.id && b.day_id == aDay && b.hour_id == aHour} );
        if (aBlock.meeting_section_id != null) {
            aSection = props.sections.find(b =>{return b.id == aBlock.meetsec.section_id } );
            let meet_id = aBlock.meetsec.meeting_id;
            let meeting = aSection.meetings.find(m => {return m.id == meet_id});
            type = null;
            
            //Aqui establece el valor de la variable "type" la cual determina el tipo de diseño que tendra el bloque
            if (oldB == null) {
                if (meeting.hour_amount == 1) {
                    type = 0; //Individual
                }else{
                    type = 1;
                    limit = meeting.hour_amount - 1;
                }
            }else{
                if (oldB.meetsec == null) {
                    if (meeting.hour_amount > 1) {
                        type = 1;

                        limit = meeting.hour_amount - 1;

                    }else{
                            type = 0; //Individual
                    }
                    oldB = aBlock;
                    return aBlock;
                }
                
                if (aBlock.meetsec.id == oldB.meetsec.id && aBlock.meetsec.meeting_id == oldB.meetsec.meeting_id) {
                    if (limit == 1) {
                        type = 3; //Final
                    }else{
                        type = 2; //Centro
                        limit = limit - 1;
                    }
                }else{
                    if (meeting.hour_amount > 1) {
                        type = 1; //Inicio
                        limit = meeting.hour_amount - 1
                    }else{
                            type = 0; //Individual
                    }
                }                

            }
            
        }else{
            aSection = null;
            type = null;
        }
        
        oldB = aBlock;
        return aBlock;
    }
    
</script>



<template>
    <div class="h-full " v-show="classroom.id == selectC">
        <div class="sticky top-0 z-40 flex flex-row space-x-10 px-3 py-2 rounded-t-lg bg-purple-200 items-center">
            <div class="">
                <span class="font-bold text-lg w-20 truncate">Aula - {{ classroom.name }}</span>
                <span class="ms-1">({{ classroom.type.name }})</span>
            </div>
            <div >Ubicacion - {{ classroom.ubication.name }}</div>
        </div>
        <div class="flex h-3/4  overflow-y-auto">        
            <table class="whitespace-no-wrap ">
                <thead class="sticky top-0 z-40">
                    <tr class=" text-xs font-semibold  text-purple-400 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class=" py-1">Horas</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr v-if="hours" v-for="hour in hours" :key="hour.id" class="text-gray-700 dark:text-gray-400">

                        <td class="h-12">
                            <div class="text-xs flex flex-col">
                                <div>{{ hour.start }}</div> 
                                <div>{{ hour.end }}</div>
                            </div>
                        </td>
                        
                        
                    </tr>                    
                </tbody>
            </table>

            <table v-if="days" v-for="day in days" :key="day.id" class="w-1/5 whitespace-no-wrap">
                <thead class="sticky top-0 z-40">
                    <tr class="text-xs font-semibold  text-purple-400 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class=" py-1">{{ day.name }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr v-if="hours" v-for="hour in hours" :key="hour.id" class="text-gray-700">

                        <td class="h-12 relative ">
                            <Block :block="block(classroom, day.id, hour.id)" :section="aSection" :classroom="classroom" :type="type"  />
                        </td>
                        
                        
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</template>