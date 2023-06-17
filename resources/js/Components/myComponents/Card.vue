<script setup>
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
        class="cursor-pointer bg-red-300 rounded-lg p-1 place-content-center"
        :id="id"
        :draggable="draggable"
        @dragstart="dragStart"
        @dragover.prevent
    >
        <slot />
    </div>
</template>