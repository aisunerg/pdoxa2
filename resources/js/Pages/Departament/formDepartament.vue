<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { selectObj, store } from "@/utilidades";

const props = defineProps({
    adresses: {
        type: Object,
        default: null
    },
    teachers: {
        type: Object,
        default: null
    },
})

const form = useForm({
    name: '',    
    adress: '',    
    teacher: '',    
    avr: '',    
})


</script>

<template>
    <form @submit.prevent="store('departament.store')" class=" grid grid-cols-4 gap-4">
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
                value="Direccion"                 
            />
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                        <div v-if="form.adress !=''" class="text-xs ">{{ selectObj(form.adress, adresses) }}</div>
                        <div v-else>Elige el area</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.adress = adress.id" v-for="adress in adresses" :key="adress.id">
                        {{ adress.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>
           </div>           

            <InputError class="mt-2" :message="form.errors.pensum" />
        </div>
        <div class="">
            <InputLabel                
                value="Direccion"                 
            />
            
            <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                        <div v-if="form.teacher !=''" class="text-xs ">{{ selPensum(form.teacher, teachers) }}</div>
                        <div v-else>Elige el Docente</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.teacher = teacher.id" v-for="teacher in teachers" :key="teacher.id">
                        {{ teacher.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>
           </div>          

            <InputError class="mt-2" :message="form.errors.pensum" />
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
                autofocus
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div> 



        <div class="">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
