<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputSearch from '@/Components/myComponents/inputSearch.vue';
import InputSelect from '@/Components/myComponents/InputSelect.vue';
import SelectSubjects from '@/Components/myComponents/selectSubjects.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { selectObj, selectAll } from '@/utilidades';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    areas: {
        type: Object,
        default: null
    },
    shifts:{
        type:Object,
        default:null
    },
    subjects:{
        type:Object,
        default:null
    },
    teachers:{
        type:Object,
        default:null
    },
    project:{
        type:Object,
        default:null
    },
})


let aTeachers = props.teachers.map(t => ({ id: t.id, name: t.name + ' ' + t.lastname }));

function defineProf(e){
    form.profesor = e;
}

const form = useForm({
    name: '',
    materia: '',
    project: props.project.id,
    quota: '',
    shift_id: '',
    profesor: '',
});

const store = () => {
    form.post(route('project.section.store', props.project.slug),{
        onSuccess: () => form.reset(),
    })
}
</script>

<template>
    <form @submit.prevent="store" class=" grid grid-cols-4 gap-4">
        <div class="">
            <InputLabel                
                value="Nombre"                 
            />
            
            <TextInput
                class=""
                v-model="form.name"
                type="text" 
                required
                autofocus
            />

            <InputError class="mt-1" :message="form.errors.name" />
        </div>
        
        <div class="">
            <InputLabel                
            value="Materia"                 
            />
            
           <div class="">
                <SelectSubjects 
                    v-model="form.materia"
                    :options="subjects"
                    propName="name"
                    propValue="id"
                />
                <InputError class="mt-1" :message="form.errors.materia" />
            </div>
        
        </div>
        
        <div class="">
            <InputLabel                
                value="Cuota"                 
            />
            
            <TextInput
                class=""
                v-model="form.quota"
                type="number" 
                required
            />

            <InputError class="mt-1" :message="form.errors.quota" />
        </div>

        <div class="">
            <InputLabel                
                value="Turno"                 
            />
            
           <div class="">
            <InputSelect 
                    v-model="form.shift_id"
                    :options="shifts"
                    propName="name"
                    propValue="id"
                />
           </div>

            <InputError class="mt-1" :message="form.errors.shift" />
        </div>
        
        <div class="">
            <InputLabel                
                value="Profesor"                 
            />
            
           <div class="">
                <InputSearch
                    
                    @enviarID="defineProf"
                    :options="aTeachers"
                    propName="name"
                    propValue="id"
                />
           </div>

            <InputError class="mt-1" :message="form.errors.profesor" />
        </div>
        



        <div class="mt-2">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
