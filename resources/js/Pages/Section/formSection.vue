<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
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

var pen = ref(null);

function grupo(lvl) {    
    if (pen == lvl) {
        return false
    }else{
        pen = lvl
        return true        
    }
}

const form = useForm({
    name: '',
    subject: '',
    project: props.project.id,
    quota: '',
    shift_id: '',
    teacher_id: '',
});

const store = () => {
    form.post(route('project.section.store', props.project.slug))
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

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        
        <div class="">
            <InputLabel                
            value="Materia"                 
            />
            
           <div class="">
                <Dropdown
                    contentClasses="bg-white mt-0 overflow-y-scroll h-32"
                    width="32"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                            <div v-if="form.subject != ''" class="text-sm truncate h-6 p-1">{{ selectObj(form.subject, subjects) }}</div>
                            <div v-else>Elige la materia</div>
                        </button>
                    </template>
                    <template #content>
                            <div class="px-1" @click="form.subject = subject.id" v-for="(subject) in subjects" :key="subject.id">
                                <div class="font-bold" v-if="grupo(subject.level)">
                                    Semestre {{ subject.level }}
                                </div>
                                <div class="hover:bg-slate-200 cursor-pointer rounded-lg pl-2">{{subject.name  }}</div>

                            </div>
                        
                    </template>
                </Dropdown>
                <InputError class="mt-2" :message="form.errors.subject" />
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

            <InputError class="mt-2" :message="form.errors.quota" />
        </div>

        <div class="">
            <InputLabel                
                value="Turno"                 
            />
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0" 
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                        <div v-if="form.shift_id != ''" class="text-sm h-6 p-1">{{ selectObj(form.shift_id, shifts) }}</div>
                        <div v-else>Elige el turno</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.shift_id = shift.id" v-for="shift in shifts" :key="shift.id">
                        {{ shift.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>
           </div>

            <InputError class="mt-2" :message="form.errors.shift" />
        </div>
        
        <div class="">
            <InputLabel                
                value="Profesor"                 
            />
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0 overflow-y-scroll h-32 p-1"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                        <div v-if="form.teacher_id != ''" class="text-sm h-6 p-1">{{ selectAll(form.teacher_id, teachers) }}</div>
                        <div v-else>Elige el profesor</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.teacher_id = teacher.id" v-for="teacher in teachers" :key="teacher.id">
                        {{ teacher.name+" "+teacher.lastname}}
                    </div>
                    
                    
                </template>
            </Dropdown>
           </div>

            <InputError class="mt-2" :message="form.errors.shift" />
        </div>
        



        <div class="">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
