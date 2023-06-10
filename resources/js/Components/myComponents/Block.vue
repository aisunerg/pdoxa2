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
    block:{
        type: Object,
        default: null,
        required: true
    },
})






function drop(e) {
    console.log("soltaste loco");
    const meetsec_id = e.dataTransfer.getData('id');
    const meet = e.dataTransfer.getData('meet');
    console.log("id meet: "+meet);
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
        class="rounded-lg p-1 bg-purple-200 flex flex-col h-10 w-full text-purple-800"

        @dragover.prevent
        @drop.prevent="drop"
    >
        ASIGNADO
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
