<script setup>
import Block from '@/Components/myComponents/Block.vue';
import { ref } from 'vue';


    const props = defineProps({
        days:{
            type: Object,
            default: null
        },
        hours:{
            type: Object,
            default: null
        },
        selClassroom:{
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
        }
    })

    const form = {
        classroom: props.classroom,
        day: props.day,
        hour: props.hour
    } 

    let aSection = ref(null);

    let block = function (aClassroom, aDay, aHour){
        
        
        let aBlock = props.blocks.find(b =>{return b.classroom_id == aClassroom.id && b.day_id == aDay && b.hour_id == aHour} )
        
        if (aBlock.meeting_section_id != null) {
            aSection = props.sections.find(b =>{return b.id == aBlock.meetsec.section_id } );            
        }else{
            aSection = null;
        }
        
        return aBlock;
    }
    

</script>


<template>
    <div class="h-full ">
        <div class="sticky top-0 z-40 flex flex-row space-x-10 px-3 py-2  rounded-t-lg bg-purple-200">
            <div class="">
                <span class="font-bold text-lg w-20 truncate">Aula - {{ selClassroom.name }}</span>
                <span class="ms-1">({{ selClassroom.type.name }})</span>
            </div>
            <div >Ubicacion - {{ selClassroom.ubication.name }}</div>
        </div>
        <div class="flex h-3/4 overflow-y-auto">        
            <table class="whitespace-no-wrap ">
                <thead class="sticky top-0">
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
                <thead class="sticky top-0">
                    <tr class="text-xs font-semibold  text-purple-400 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class=" py-1">{{ day.name }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr v-if="hours" v-for="hour in hours" :key="hour.id" class="text-gray-700">

                        <td class="h-12">
                            <Block :block="block(selClassroom, day.id, hour.id)" :section="aSection" :classroom="selClassroom" :day="day.id" :hour="hour.id" />
                        </td>
                        
                        
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</template>