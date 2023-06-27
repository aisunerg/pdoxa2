<script setup>
    import { Link, useForm } from '@inertiajs/vue3';
    import { defineComponent, ref } from 'vue';

    // const props = defineProps({
    //     id:{
    //         type: String,
    //         default: null
    //     },
    //     classroom:{
    //         type: Object,
    //         default: null,
    //         required: true
    //     },
    //     type:{
    //         type: Number,
    //         default: null,
    //         // required: true
    //     },
    //     section:{
    //         type: Object,
    //         default: null
    //     },
    //     block:{
    //         type: Object,
    //         default: null,
    //         required: true
    //     },
    // });

    

    let active = ref("border-purple-200 bg-gradient-to-t from-purple-50 via-purple-200 to-purple-50");
    const zone = (val) => {
        if (val) {
            console.log('entre');
            active.value = "bg-purple-400";
        }else{
            console.log('sali');
            active.value = "border-purple-200 bg-gradient-to-t from-purple-50 via-purple-200 to-purple-50";
        }
    }

    function drop(e) {
        const meetsec_id = e.dataTransfer.getData('id');
        const meet = e.dataTransfer.getData('meet');
        const block = e.dataTransfer.getData('block');

        let form = useForm({
            block: block,
            meetsec: meetsec_id,
            // meet: JSON.parse(meet),
            meet: meet,
        });
        
        form.post(route('master.unassigned'));

        // const card = document.getElementById(card_id);
        // card.style.display = 'block';
        // e.target.appendChild(card);
    }

</script>

<template>
    
    
    

    <div
        class="rounded-lg px-2 py-1 flex flex-inline gap-1  border " 
        :class="active"

        @dragenter="zone(true)"
        @dragleave="zone(false)"

        @dragover.prevent
        @drop.prevent="drop"
    >
    <div class="inline text-purple-500">
        <svg class="inline h-4 w-4 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="#9333ea" width="800px" height="800px" viewBox="0 0 24 24"><path d="M22,5H17V2a1,1,0,0,0-1-1H8A1,1,0,0,0,7,2V5H2A1,1,0,0,0,2,7H3.061L4,22.063A1,1,0,0,0,5,23H19a1,1,0,0,0,1-.937L20.939,7H22a1,1,0,0,0,0-2ZM9,3h6V5H9Zm9.061,18H5.939L5.064,7H18.936ZM9,11v6a1,1,0,0,1-2,0V11a1,1,0,0,1,2,0Zm4,0v6a1,1,0,0,1-2,0V11a1,1,0,0,1,2,0Zm3-1a1,1,0,0,1,1,1v6a1,1,0,0,1-2,0V11A1,1,0,0,1,16,10Z"/></svg>
    </div>
    <div class="ml-2 ">Papelera</div>
    </div>
    
</template>

<style>

</style>
