<script setup>
    import { Link, useForm } from '@inertiajs/vue3';
    import axios from 'axios';
    import { defineComponent, ref } from 'vue';
import Trash from './Trash.vue';

    const props = defineProps({
        id:{
            type: String,
            default: null
        },
        classroom:{
            type: Object,
            default: null,
            required: true
        },
        type:{
            type: Number,
            default: null,
            // required: true
        },
        section:{
            type: Object,
            default: null
        },
        block:{
            type: Object,
            default: null,
            required: true
        },
    });

    let titleB = "";
    let bodyB = " ";
    switch (props.type) {
        case 1:
            titleB+=" ";
            bodyB += " ";
            break;
        case 2:
            bodyB = "dos  ";
            break;
        case 3:     
            bodyB = "";
            break;

        default:
            titleB+=" bg-red-200";
            break;
    }

    let active = ref("bg-neutral-200 ");
    const zone = (val) => {
        if (val) {
            active.value = "bg-purple-50";
        }else{
            active.value = "bg-neutral-200";
        }
    }

    function drop(e) {
        const meetsec = e.dataTransfer.getData('meetsec');
        const move = (e.dataTransfer.getData('move') === 'true') ? true : false;

        let form = useForm({
            block: props.block,
            meetsec: meetsec,
            move: move,
        });
        zone(false)
        form.post(route('master.assigment'));

        // const card = document.getElementById(card_id);
        // card.style.display = 'block';
        // e.target.appendChild(card);
    }

    let grabbed = ref(null);
    function dragStart(e) {
        e.dataTransfer.clearData();
        e.dataTransfer.setData('move', true);        
        e.dataTransfer.setData('meetsec', props.block.meeting_section_id);        
        // e.dataTransfer.setData('meet', props.meeting.id);
        e.dataTransfer.setData('block', props.block.id);
    }

</script>

<template>
    <div v-if="block.meeting_section_id != null && type == 1"
        :id="block.id"
        class='rounded-lg border-2 border-purple-200 flex flex-col w-11/12 text-purple-800 absolute top-1 left-2 z-30 bg-white cursor-grab'

        @dragstart="dragStart"
        draggable="true"
    >
        <div class='text-xs rounded-t-md px-1 tracking-wider h-max-8 bg-purple-200'>
            <div class="inline">
                <svg class="h-2.5 w-2.5 inline" xmlns="http://www.w3.org/2000/svg" fill="#000000" preserveAspectRatio="xMidYMid" width="31.906" height="31.906" viewBox="0 0 31.906 31.906">
                    <path d="M31.567,16.699 L27.622,20.644 C27.427,20.838 27.172,20.936 26.917,20.936 C26.662,20.936 26.407,20.838 26.212,20.644 C25.822,20.254 25.822,19.623 26.212,19.234 L28.539,16.906 L16.945,16.906 L16.945,28.502 L19.234,26.214 C19.623,25.824 20.254,25.824 20.644,26.214 C21.033,26.603 21.033,27.234 20.644,27.624 L16.655,31.612 C16.624,31.644 16.583,31.657 16.548,31.683 C16.479,31.736 16.413,31.793 16.332,31.827 C16.210,31.877 16.080,31.904 15.950,31.904 C15.950,31.904 15.950,31.904 15.949,31.904 C15.949,31.904 15.949,31.904 15.948,31.904 C15.936,31.904 15.927,31.898 15.915,31.897 C15.672,31.889 15.431,31.798 15.245,31.612 L11.257,27.624 C10.867,27.234 10.867,26.603 11.257,26.214 C11.646,25.824 12.277,25.824 12.667,26.214 L15.000,28.547 L15.000,16.906 L3.358,16.906 L5.687,19.234 C6.076,19.623 6.076,20.254 5.687,20.644 C5.493,20.838 5.237,20.936 4.982,20.936 C4.727,20.936 4.471,20.838 4.277,20.644 L0.286,16.655 C0.099,16.468 -0.006,16.215 -0.006,15.950 C-0.006,15.817 0.021,15.687 0.072,15.566 C0.122,15.445 0.196,15.335 0.287,15.244 L4.277,11.257 C4.666,10.867 5.298,10.867 5.687,11.257 C6.076,11.646 6.076,12.277 5.687,12.667 L3.399,14.953 L15.000,14.953 L15.000,3.351 L12.665,5.687 C12.275,6.076 11.644,6.076 11.255,5.687 C10.865,5.297 10.865,4.666 11.255,4.277 L15.225,0.306 C15.394,0.115 15.642,-0.003 15.947,-0.004 C16.077,-0.004 16.207,0.022 16.329,0.073 C16.452,0.123 16.562,0.197 16.654,0.289 L20.642,4.277 C21.031,4.666 21.031,5.297 20.642,5.687 C20.447,5.881 20.192,5.979 19.937,5.979 C19.682,5.979 19.427,5.881 19.232,5.687 L16.945,3.400 L16.945,14.953 L28.498,14.953 L26.212,12.667 C25.822,12.277 25.822,11.646 26.212,11.257 C26.601,10.867 27.232,10.867 27.622,11.257 L31.609,15.244 C31.701,15.336 31.775,15.447 31.826,15.569 C31.876,15.691 31.902,15.821 31.902,15.951 C31.902,16.270 31.773,16.528 31.567,16.699 Z"/>
                </svg>
            </div>
            {{ section.subject.name }}
        </div> 
        <div class="flex flex-row">
            <div class="w-9/12">
                <div class="text-xs px-1">{{ "Seccion: "+section.name }}</div>
                <div class="text-xs px-1">{{ section.teacher[0].name+" "+section.teacher[0].lastname }}</div>
                <div class="text-xs px-1">{{ "Cupo: "+section.quota }}</div>
            </div>
            <div class="p-1">
                <Trash :block="block"/>
            </div>
        </div>
    </div>

    <div v-else-if="block.meeting_section_id != null && type == 2"
        :id="id"
        class="bg-purple-50 absolute top-3 left-2 h-12 w-11/12 border-x-2 border-purple-200"
    >
        
    </div>

    <div v-else-if="block.meeting_section_id != null && type == 3"
        :id="id"
        class="bg-purple-50 absolute top-3 left-2 h-6 w-11/12 border-x-2 border-purple-200 rounded-b-lg"
    >
    </div>
    
    

    <div v-else
        class="rounded-lg flex flex-col h-full w-full"
        :class="active"

        :id="id"

        @dragenter="zone(true)"
        @dragleave="zone(false)"

        @dragover.prevent
        @drop.prevent="drop"
    >
    </div>
    
</template>

<style>

</style>
