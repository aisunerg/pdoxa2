<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { defineComponent } from 'vue';

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
    day:{
        type: Number,
        default: null,
        required: true
    },
    hour:{
        type: Number,
        default: null,
        required: true
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



function drop(e) {
    // console.log("soltaste loco");
    const meetsec_id = e.dataTransfer.getData('id');
    const meet = e.dataTransfer.getData('meet');
    // console.log("id meet: "+meet);
    let form = useForm({
        block: props.block,
        meetsec: meetsec_id,
        meet: JSON.parse(meet),
    });
    
    form.post(route('master.assigment'));
    // const card = document.getElementById(card_id);

    // card.style.display = 'block';

    // e.target.appendChild(card);
}

</script>

<template>
    <div v-if="block.meeting_section_id != null"
        :id="id"
        class="rounded-lg  border-2 border-purple-200 flex flex-col h-10 w-full text-purple-800"

        @dragover.prevent
        @drop.prevent="drop"
    >
        <div class="text-xs rounded-t-lg bg-purple-200 px-1">{{ section.subject.name }}</div> 
        <div class="text-sm px-1">{{ section.teacher[0].name+" "+section.teacher[0].lastname+" / Seccion: "+section.name }}</div>
    </div>    
    <div v-else
        class="rounded-lg p-1 bg-neutral-200 flex flex-col h-10 w-full"

        :id="id"

        @dragover.prevent
        @drop.prevent="drop"
    >
    </div>
    
</template>

<style>

</style>
