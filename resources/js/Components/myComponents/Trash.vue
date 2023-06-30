<script setup>
    import { Link, useForm } from '@inertiajs/vue3';
    import { defineComponent, ref } from 'vue';

    const props = defineProps({
        block:{
            type: Object,
            default: null
        },
    });

    

    let active = ref(" border-1 border-purple-200 bg-gradient-to-t from-purple-50 via-purple-200 to-purple-50");
    let icon = ref('#9333ea');
    const zone = (val) => {
        if (val) {
            active.value = "border-2 border-purple-300 bg-purple-400 bg-gradient-to-t from-purple-300 via-purple-500 to-purple-300";
            icon.value = "#FFFFFF";
        }else{
            icon.value = "#9333ea";
            active.value = "border-1 border-purple-200 bg-gradient-to-t from-purple-50 via-purple-200 to-purple-50";
        }
    }

    function borrar() {
        console.log(props.block);
        let form = useForm({
            block: props.block.id
        });
        
        form.post(route('master.unassigned'));
    }

</script>

<template>
    
    
    

    <div
        class="rounded-lg px-2 py-1 flex flex-inline gap-1 border cursor-pointer" 
        :class="active"

        @mouseover="zone(true)"
        @mouseleave="zone(false)"

            @click="borrar"
    >
        <div class="inline ">
            <svg class="inline h-4 w-4 " xmlns="http://www.w3.org/2000/svg" :fill="icon" width="800px" height="800px" viewBox="0 0 24 24"><path d="M22,5H17V2a1,1,0,0,0-1-1H8A1,1,0,0,0,7,2V5H2A1,1,0,0,0,2,7H3.061L4,22.063A1,1,0,0,0,5,23H19a1,1,0,0,0,1-.937L20.939,7H22a1,1,0,0,0,0-2ZM9,3h6V5H9Zm9.061,18H5.939L5.064,7H18.936ZM9,11v6a1,1,0,0,1-2,0V11a1,1,0,0,1,2,0Zm4,0v6a1,1,0,0,1-2,0V11a1,1,0,0,1,2,0Zm3-1a1,1,0,0,1,1,1v6a1,1,0,0,1-2,0V11A1,1,0,0,1,16,10Z"/></svg>
        </div>
    </div>
    
</template>

<style>

</style>
