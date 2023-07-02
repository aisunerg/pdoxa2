<script setup>
    import { Link, useForm } from '@inertiajs/vue3';
    import { defineComponent, ref } from 'vue';

    const props = defineProps({
        section:{
            type: Object,
            default: null
        },
        blocks:{
            type: Object,
            default: null
        },
    });
    ;

    function encuentro(meetsec){
        let aBlocks = props.blocks.filter(block => block.meeting_section_id == meetsec)
        if (aBlocks.length > 0) {
            return aBlocks[0].day.name+" "+aBlocks[0].classrooms.name+" / "+aBlocks[0].hour.start.slice(0,5)+" a "+aBlocks[aBlocks.length-1].hour.end.slice(0,5)
        }
    }

</script>

<template>
<td v-if="section != null" class="text-sm px-1">
    <span>{{ section.teacher[0].name+" "+section.teacher[0].lastname }}</span>
    <div v-for="meeting in section.meetings" >
        {{encuentro(meeting.pivot.id)}}
    </div>
    <div>{{ "Cupos: "+section.quota }}</div>

</td>
<td v-else>

</td>
    
</template>

<style>

</style>
