<script setup>
    defineProps({
        id:{
            type: String,
            default: null
        },
        draggable:{
            type: String,
            default: null
        },
    })

    function dragStart(e) {
        console.log('me empezaste a mover loco');
        const target = e.target;

        console.log(target.id);

        e.dataTransfer.clearData();
        e.dataTransfer.setData('id', target.id);

        setTimeout(() => {
            target.style.display = "none";
        }, 0);
    }
</script>

<template>
    <div 
        class="w-32 h-12 bg-red-300 rounded-lg p-1 place-content-center"
        :id="id"
        :draggable="draggable"
        @dragstart="dragStart"
        @dragover.prevent
    >
        <slot />
    </div>
</template>