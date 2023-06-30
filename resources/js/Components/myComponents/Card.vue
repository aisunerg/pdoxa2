<script setup>
import { computed, ref } from 'vue';

    const props = defineProps({
        meetsec:{
            type: Number,
            default: null
        },
        meeting:{
            type: Object,
            default: null
        },
        blocks:{
            type: Object,
            default: null
        },
        section:{
            type: Object,
            default: null
        },
        draggable:{
            type: String,
            default: null
        },
        classtypes:{
            type: Object,
            default: null
        },
    });

    let selBlocks = ref(null);
    let move = ref(null);


    console.log(props.meeting.classroomType_id);

    const asignado = computed(() => {
        
        let asigna = props.blocks.filter(function (e) {
            return e.meeting_section_id == props.meetsec;
        });

        if (asigna.length == 0) {
            move.value = 'false';
            return false;
        }else{
            selBlocks.value = asigna;
            move.value = 'true';
            return true;
        }
    });

    function type() {
        let cType = props.classtypes.find(e => e.id == props.meeting.classroomType_id);
        return "("+cType.name+")";
    }

    function dragStart(e) {

        e.dataTransfer.clearData();
        e.dataTransfer.setData('meetsec', props.meetsec);
        e.dataTransfer.setData('move', move.value);        
        e.dataTransfer.setData('meet', props.meeting.id);

        // setTimeout(() => {
        //     target.style.display = "none";
        // }, 0);
    }
</script>

<template>
    <div 
        class=" bg-gradient-to-b from-purple-100 to-purple-300 shadow-inner rounded-md cursor-grab place-content-center"
        :draggable="draggable"
        @dragstart="dragStart"
        @dragover.prevent
    >
        <!-- ASIGNADO -->
        <div v-if="asignado" class="text-sm text-black text-end flex">
            <div class="ml-1">
                <svg class="h-3 w-3 inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Vector" d="M12 21V12M12 21L15 18M12 21L9 18M12 12V3M12 12H3M12 12H21M12 3L9 6M12 3L15 6M3 12L6 15M3 12L6 9M21 12L18 9M21 12L18 15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="font-medium text-sm p-0.5 h-max-1/2 h-1/2 w-full flex flex-col justify-between">
                <div class="text-start w-full">{{'Aula: '+selBlocks[0].classrooms.name+" "}} {{type()}}</div>
                <div class="text-start">{{selBlocks[0].day.name+": "+selBlocks[0].hour.start.slice(0, 5)+" a "+selBlocks[selBlocks.length - 1].hour.end.slice(0, 5)}}</div>
            </div>  
        </div>

        <!-- LIBRE -->
        <div v-else class="text-sm text-black text-end flex p-1 cursor-grab">
            <div class="">
                <svg class="h-4 w-4 inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Vector" d="M12 21V12M12 21L15 18M12 21L9 18M12 12V3M12 12H3M12 12H21M12 3L9 6M12 3L15 6M3 12L6 15M3 12L6 9M21 12L18 9M21 12L18 15" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="font-medium px-1 h-max-10 h-10 w-full flex justify-between">
                <div class="text-start w-full">{{section.subject.name}} <span class="inline-block">{{type()}}</span></div>
                <div class="py-2 text-md">{{" "+meeting.hour_amount+"h"}}</div>
            </div>
        </div>
    </div>
</template>