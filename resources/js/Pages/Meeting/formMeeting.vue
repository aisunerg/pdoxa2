<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { selectObj, store } from "@/utilidades";
import { ref } from 'vue';


const props = defineProps({
        classroom_types:{
            type:Object,
            default:null
        },
        subject:{
            type:Object,
            default:null
        }
    })

const form = useForm({
    subject: '',
    hours: '',
    classroom_type: ''
})

let mask = ref(null);

if (props.subject) {
    form.subject = props.subject.id;
    mask= props.subject.name
}

const create = () => {
    form.post(route('meeting.store'))
}
</script>

<template>
    <form @submit.prevent="create" class="mt-2 bg-slate-200 p-2 rounded-lg mr-20">
        <div class="flex flex-row gap-2 content-center">
            <div class="">
                <InputLabel                
                    value="Materia"                 
                />
                
                <TextInput v-if="subject"
                    class=""
                    v-model="mask"
                    :value="subject.name"
                    type="text" 
                    required
                    readonly
                />
                <TextInput v-else
                    class=""
                    v-model="form.subject"
                    type="text" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="">
                <InputLabel                
                    value="Cantidad de Horas"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.hours"
                    type="number" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.sep_num" />
            </div>
            <div class="">
                <InputLabel                
                    value="Tipo de Aula"                 
                />
                
            <div class="">
                <Dropdown contentClasses="bg-gray-400" align="left">
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                            <div v-if="form.classroom_type != ''">{{ selectObj(form.classroom_type, classroom_types) }}</div>
                            <div v-else>Selecciona</div>
                        </button>
                    </template>
                    <template #content>                    
                        <div class="hover:bg-slate-200 cursor-pointer" @click="form.classroom_type = classroom_type.id" v-for="classroom_type in classroom_types" :key="classroom_type.id">
                            {{ classroom_type.name }}
                        </div>       
                    </template>
                </Dropdown>
            </div>

                <InputError class="mt-2" :message="form.errors.pensum" />
            </div>
            
            <div class=" p-5 ">
                    
                <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear
                </PrimaryButton>
                
            </div>
        </div>
    </form>
    
</template>
