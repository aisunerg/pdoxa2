<script setup>
import { Link } from '@inertiajs/vue3';
import { defineComponent } from 'vue';

defineProps({
    id:{
        type: String,
        default: null
    }
})

function drop(e) {
    console.log("soltaste loco");
    const card_id = e.dataTransfer.getData('id');
    console.log("id de la card: "+card_id);
    const card = document.getElementById(card_id);

    card.style.display = 'block';

    e.target.appendChild(card);
}

</script>

<template>
    <div
        :id="id"
        class="rounded-lg p-1 bg-neutral-500 w-36 h-full flex flex-col gap-2"
        @dragover.prevent
        @drop.prevent="drop"
    >
        <slot />
    </div>    
    
</template>

<style>

</style>
