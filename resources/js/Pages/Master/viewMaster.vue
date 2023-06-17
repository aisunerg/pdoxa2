<script setup>
    import MasterLayout from '@/Layouts/MasterLayout.vue';
    import { Head, router, usePage} from '@inertiajs/vue3';
    import formShift from '@/Pages/Shift/formShift.vue';
    import DropdownX from "@/Components/DropdownX.vue";
    import { selectObj } from '@/utilidades';
    import { onMounted, ref, watch } from 'vue';
    import classBlocks from '@/Pages/Master/classBlocks.vue';
import Modal from '@/Components/Modal.vue';
        
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
        project: {
            type: Object
        },
    })

    let mostrar = ref(true);
    let page = usePage();
    
    
    


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

    
    function close() {
        console.log("cerrar");
        page.props.flash.message = null;
    }

</script>

<template>
    <Head title="Maestro de Aula"/>
    <div v-if="$page.props.flash.message">
        <Modal :show="($page.props.flash.message) ? true :false" @close="close()">
            {{$page.props.flash.message}}
        </Modal>
    </div>
    <MasterLayout :subjects="subjects" :sections="sections" :sec_met="sec_met" :meetings="meetings" :project="project">
        <template #header>
                <div class="">
                    Maestro de Aula
                </div>
        </template>
        <div class="flex flex-row">
            <div v-for="classroom in classrooms">
                <div 
                    class="bg-purple-200 p-1 px-2 ml-2 outline outline-offset-1 outline-2 outline-white hover:outline-purple-500 cursor-pointer rounded-t-lg" 
                    @click="selClassroom = classroom"
                    
                >
                    {{ classroom.name }}
                </div>
            </div>
        </div>
        <Suspense>
                <classBlocks v-if="selClassroom" 
                :sections="sections" 
                :selClassroom="selClassroom" 
                :blocks="blocks" 
                :hours="selHour(selClassroom.scheme_hour_id)"
                :days="selDay(selClassroom.scheme_day_id)"    
                />
        </Suspense>
            
    </MasterLayout>
    
    
</template>