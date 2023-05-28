<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const props = defineProps({
    areas: {
        type: Object,
        default: null
    },
    states: {
        type: Object,
        default: null
    },
    municipies: {
        type: Object,
        default: null
    },
})

let name = ref(null);

function selPensum (id, array){    
    let val;
    array.forEach(e => {
        if (e.id == id) {
            val = e.name;
        }
    });
    return val;
}

const form = useForm({
    CI: '',
    name: '',
    lastname: '',
    area: '',
    phone: '',
    home_phone: '',
    email: '',
    adress: '',
    state: '',
    municipy: '',
    
})

const createProject = () => {
    form.post(route('teacher.store'))
}
</script>

<template>
    <form @submit.prevent="createProject" class=" grid grid-cols-4 gap-4">
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
                value="Cedula"                 
            />
            
            <TextInput
                class=""
                v-model="form.CI"
                type="text" 
                required
                autofocus
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="">
            <InputLabel                
                value="Apellido"                 
            />
            
            <TextInput
                class=""
                v-model="form.lastname"
                type="text" 
                required
                autofocus
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="">
            <InputLabel                
                value="Area"                 
            />
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-2 border w-48 bg-white text-left rounded-lg shadow-lg">
                        <div v-if="form.area !=''" class="text-xs ">{{ selPensum(form.area, areas) }}</div>
                        <div v-else>Elige el area</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.area = area.id" v-for="area in areas" :key="area.id">
                        {{ area.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>
           </div>

            <InputError class="mt-2" :message="form.errors.pensum" />
        </div>
        <div class="">
            <InputLabel                
                value="Telefono"                 
            />
            
            <TextInput
                class=""
                type="text"
                v-model="form.phone" 
                required
            />

            <InputError class="mt-2" :message="form.errors.lapso" />
        </div>
        <div class="">
            <InputLabel                
                value="Telefono Fijo"                 
            />
            
            <TextInput
                class=""
                type="text"
                v-model="form.home_phone" 
            />

            <InputError class="mt-2" :message="form.errors.lapso" />
        </div>
        <div class="">
            <InputLabel                
                value="Email"                 
            />
            
            <TextInput
                class=""
                v-model="form.email" 
                type="email"
                required
            />

            <InputError class="mt-2" :message="form.errors.fecha" />
        </div>
        <div class="">
            <InputLabel                
                value="Direccion"                 
            />
            
            <TextInput
                class=""
                v-model="form.adress" 
                type="text"
                required
            />

            <InputError class="mt-2" :message="form.errors.fecha" />
        </div>
        <div class="">
            <InputLabel                
                value="Estado"                 
            />
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-2 border w-48 bg-white text-left rounded-lg shadow-lg">
                        <div v-if="form.state !=''" class="text-xs ">{{ selPensum(form.state, states) }}</div>
                        <div v-else>Elige el estado</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.state = state.id" v-for="state in states" :key="state.id">
                        {{ state.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>

            <InputError class="mt-2" :message="form.errors.fecha" />
        </div>
        <div class="">
            <InputLabel                
                value="Municipio"                 
            />
            
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-2 border w-48 bg-white text-left rounded-lg shadow-lg">
                        <div v-if="form.municipy !=''" class="text-xs ">{{ selPensum(form.municipy, municipies) }}</div>
                        <div v-else>Elige el area</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.municipy = municipy.id" v-for="municipy in municipies" :key="municipy.id">
                        {{ municipy.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>

            <InputError class="mt-2" :message="form.errors.fecha" />
        </div>



        <div class="">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
