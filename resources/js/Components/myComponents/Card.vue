<script setup>
import { onMounted } from 'vue';

    const props = defineProps({
        id:{
            type: Number,
            default: null
        },
        meeting:{
            type: Object,
            default: null
        },
        draggable:{
            type: String,
            default: null
        },
    })

    onMounted(() => {        
        console.log('CARGADO')
    });
    function dragStart(e) {
        const target = e.target;

        e.dataTransfer.clearData();
        e.dataTransfer.setData('id', target.id);
        
        e.dataTransfer.setData('meet', JSON.stringify(props.meeting));

        // setTimeout(() => {
        //     target.style.display = "none";
        // }, 0);
    }
</script>

<template>
    <div 
        class=" bg-gradient-to-b from-purple-100 to-purple-300 shadow-inner rounded-md cursor-pointer place-content-center"
        :id="id"
        :draggable="draggable"
        @dragstart="dragStart"
        @dragover.prevent
    >
        <slot />
    </div>
</template>