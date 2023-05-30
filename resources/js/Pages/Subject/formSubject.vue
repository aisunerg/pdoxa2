<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { selectObj, store } from "@/utilidades";

const props = defineProps({
    departaments: {
        type: Object,
        default: null
    },
    pensums: {
        type: Object,
        default: null
    },
});

const form = useForm({
    code: '',
    name: '',
    avr: '',
    u_c: '',
    h_s: '',
    pensum: '',
    level: '',
    departament: '',
});

</script>

<template>
    <form @submit.prevent="store('subject.store', form)" class="mt-6 gap-2 grid grid-cols-4">
        <div class="">
            <InputLabel                
                value="Codigo"                 
            />
            
            <TextInput
                class=""
                v-model="form.code"
                type="text" 
                required
                autofocus
            />

            <InputError class="mt-2" :message="form.errors.code" />
        </div>
        <div class="">
            <InputLabel                
                value="Nombre"                 
            />
            
            <TextInput
                class=""
                v-model="form.name"
                type="text" 
                required
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="">
            <InputLabel                
                value="Abreviacion"                 
            />
            
            <TextInput
                class=""
                v-model="form.avr"
                type="text" 
                required
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="">
            <InputLabel                
                value="Unidades de Credito"                 
            />
            
            <TextInput
                class=""
                v-model="form.u_c"
                type="number" 
                required
                
            />

            <InputError class="mt-2" :message="form.errors.u_c" />
        </div>
        <div class="">
            <InputLabel                
                value="Horas"                 
            />
            
            <TextInput
                class=""
                v-model="form.h_s"
                type="number" 
                required
                
            />

            <InputError class="mt-2" :message="form.errors.h_s" />
        </div>
        <div class="">
            <InputLabel                
                value="Pensum"                 
            />
            
           <div class="">
            <Dropdown contentClasses="bg-gray-400" align="left">
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                        <div v-if="form.pensum != ''">{{ selectObj(form.pensum, pensums) }}</div>
                        <div v-else>Elige el Pensum</div>
                    </button>
                </template>
                <template #content>                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.pensum = pensum.id" v-for="pensum in pensums" :key="pensum.id">
                        {{ pensum.name }}
                    </div>       
                </template>
            </Dropdown>
           </div>

            <InputError class="mt-2" :message="form.errors.pensum" />
        </div>
        <div class="">
            <InputLabel                
                value="Nivel"                 
            />
            
            <TextInput
                class=""
                type="number"
                v-model="form.level" 
                required
            />

            <InputError class="mt-2" :message="form.errors.level" />
        </div>
        <div class="">
            <InputLabel                
                value="Departamento"                 
            />
            
           <div class="">
            <Dropdown contentClasses="bg-gray-400" align="left">
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                        <div v-if="form.departament != ''">{{ selectObj(form.departament, departaments) }}</div>
                        <div v-else>Elige el Departamento</div>
                    </button>
                </template>
                <template #content>                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.departament = departament.id" v-for="departament in departaments" :key="departament.id">
                        {{ departament.name }}
                    </div>       
                </template>
            </Dropdown>
           </div>

            <InputError class="mt-2" :message="form.errors.pensum" />
        </div>
        
        <div class="">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
