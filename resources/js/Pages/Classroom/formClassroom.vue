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
    classrooms: {
        type: Object,
        default: null
    },
    classroom_types:{
        type:Object,
        default:null
    },
    ubications:{
        type:Object,
        default:null
    },
    scheme_days:{
        type:Object,
        default:null
    },
    scheme_hours:{
        type:Object,
        default:null
    },
    project:{
        type:Object,
        default:null
    },
})


const form = useForm({
    name: '',
    project: props.project.id,
    classroom_type: '',
    ubication: '',
    scheme_day: '',
    scheme_hour: '',
});

const store = () => {
    form.post(route('project.classroom.store', props.project.slug))
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
            value="Tipo de Aula"                 
            />
            
           <div class="">
                <Dropdown
                    contentClasses="bg-white mt-0 overflow-y-scroll h-32"
                    width="32"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                            <div v-if="form.classroom_type != ''" class="text-sm truncate h-6 p-1">{{ selectObj(form.classroom_type, classroom_types) }}</div>
                            <div v-else>Elige el Tipo de Aula</div>
                        </button>
                    </template>
                    <template #content>
                            <div class="px-1" @click="form.classroom_type = classroom_type.id" v-for="(classroom_type) in classroom_types" :key="classroom_type.id">
                                <div class="hover:bg-slate-200 cursor-pointer rounded-lg pl-2">{{classroom_type.name  }}</div>
                            </div>
                        
                    </template>
                </Dropdown>
                <InputError class="mt-2" :message="form.errors.classroom_type" />
            </div>
        
        </div>
        
        <div class="">
            <InputLabel                
            value="Ubicacion"                 
            />
            
           <div class="">
                <Dropdown
                    contentClasses="bg-white mt-0 overflow-y-scroll h-32"
                    width="32"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                            <div v-if="form.ubication != ''" class="text-sm truncate h-6 p-1">{{ selectObj(form.ubication, ubications) }}</div>
                            <div v-else>Elige la Ubicacion</div>
                        </button>
                    </template>
                    <template #content>
                            <div class="px-1" @click="form.ubication = ubication.id" v-for="(ubication) in ubications" :key="ubication.id">
                                <div class="hover:bg-slate-200 cursor-pointer rounded-lg pl-2">{{ubication.name  }}</div>
                            </div>
                        
                    </template>
                </Dropdown>
                <InputError class="mt-2" :message="form.errors.ubication" />
            </div>
        
        </div>
        
        <div class="">
            <InputLabel                
            value="Esquema de Dia"                 
            />
            
           <div class="">
                <Dropdown
                    contentClasses="bg-white mt-0 overflow-y-scroll h-32"
                    width="32"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                            <div v-if="form.scheme_day != ''" class="text-sm truncate h-6 p-1">{{ selectObj(form.scheme_day, scheme_days) }}</div>
                            <div v-else>Selecionar</div>
                        </button>
                    </template>
                    <template #content>
                            <div class="px-1" @click="form.scheme_day = scheme_day.id" v-for="(scheme_day) in scheme_days" :key="scheme_day.id">
                                <div class="hover:bg-slate-200 cursor-pointer rounded-lg pl-2">{{scheme_day.name  }}</div>
                            </div>
                        
                    </template>
                </Dropdown>
                <InputError class="mt-2" :message="form.errors.scheme_day" />
            </div>
        
        </div>

        <div class="">
            <InputLabel                
            value="Esquema de Hora"                 
            />
            
           <div class="">
                <Dropdown
                    contentClasses="bg-white mt-0 overflow-y-scroll h-32"
                    width="32"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                            <div v-if="form.scheme_hour != ''" class="text-sm truncate h-6 p-1">{{ selectObj(form.scheme_hour, scheme_hours) }}</div>
                            <div v-else>Seleccione</div>
                        </button>
                    </template>
                    <template #content>
                            <div class="px-1" @click="form.scheme_hour = scheme_hour.id" v-for="(scheme_hour) in scheme_hours" :key="scheme_hour.id">
                                <div class="hover:bg-slate-200 cursor-pointer rounded-lg pl-2">{{scheme_hour.name  }}</div>
                            </div>
                        
                    </template>
                </Dropdown>
                <InputError class="mt-2" :message="form.errors.scheme_hour" />
            </div>
        
        </div>
        
        <div class="">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
