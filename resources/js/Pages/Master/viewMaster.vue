<script setup>
    import MasterLayout from '@/Layouts/MasterLayout.vue';
    import { Head, router} from '@inertiajs/vue3';
    import formShift from '@/Pages/Shift/formShift.vue';
    import DropdownX from "@/Components/DropdownX.vue";
    import { selectObj } from '@/utilidades';
    import { ref } from 'vue';
    import classBlocks from '@/Pages/Master/classBlocks.vue';
        
    const props = defineProps({
        subjects: {
            type: Object
        },
        sections: {
            type: Object
        },
        sec_met: {
            type: Object
        },
        meetings: {
            type: Object
        },
        classrooms: {
            type: Object
        },
        schemedays: {
            type: Object
        },
        schemehours: {
            type: Object
        },
        days: {
            type: Object
        },
        hours: {
            type: Object
        },
        blocks: {
            type: Object
        },
    })
    
    let selClassroom = ref(null);
    var selHours =ref(null);

    function selHour(schemeH_id) {
        let hours = props.hours.filter(e => e.scheme_hour_id == schemeH_id)
        return hours;
    }

    function selDay(schemeD_id) {
        let days = props.days.filter(e => e.scheme_day_id == schemeD_id)
        return days;
    }
</script>

<template>
    <Head title="Maestro de Aula"/>
    <MasterLayout :subjects="subjects" :sections="sections" :sec_met="sec_met" :meetings="meetings">
        <template #header>
                <div class="">
                    Maestro de Aula
                </div>
        </template>
        <div class="flex flex-row">
            <div v-for="classroom in classrooms">
                <div class="bg-purple-200 p-1 px-2 ml-2 outline outline-offset-1 outline-2 outline-white hover:outline-purple-500 cursor-pointer rounded-t-lg" @click="selClassroom = classroom">
                    {{ classroom.name }}
                </div>
            </div>
        </div>
        <Suspense>
            <classBlocks v-if="selClassroom" 
            :selClassroom="selClassroom" 
            :blocks="blocks" 
            :hours="selHour(selClassroom.scheme_hour_id)"
            :days="selDay(selClassroom.scheme_day_id)"    
            />
        </Suspense>
            
    </MasterLayout>
    
    
</template>