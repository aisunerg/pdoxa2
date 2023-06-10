<script setup>
import Block from '@/Components/myComponents/Block.vue';


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
        }
    })

    const form = {
        classroom: props.classroom,
        day: props.day,
        hour: props.hour
    } 

    let block = function (aClassroom, aDay, aHour){
        
        
        let aBlock = props.blocks.find(b =>{return b.classroom_id == aClassroom.id && b.day_id == aDay && b.hour_id == aHour} )
        return aBlock;
    }
    
</script>


<template>
    <span>Aula - {{ selClassroom.name }}</span>
    <div class="flex overflow-y-auto">        
        <table class=" whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold  text-purple-400 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class=" py-1">Horas</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr v-if="hours" v-for="hour in hours" :key="hour.id" class="text-gray-700 dark:text-gray-400">

                    <td class="py-2">
                        <div class="text-xs flex flex-col">
                            <div>{{ hour.start }}</div> 
                            <div>{{ hour.end }}</div>
                        </div>
                    </td>
                    
                    
                </tr>                    
            </tbody>
        </table>

        <table v-if="days" v-for="day in days" :key="day.id" class="w-1/5 whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold  text-purple-400 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class=" py-1">{{ day.name }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr v-if="hours" v-for="hour in hours" :key="hour.id" class="text-gray-700">

                    <td class="">
                        <Block :block="block(selClassroom, day.id, hour.id)" :classroom="selClassroom" :day="day.id" :hour="hour.id" />
                    </td>
                    
                    
                </tr>                    
            </tbody>
        </table>
    </div>
</template>