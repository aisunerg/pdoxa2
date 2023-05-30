<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { selectObj } from '@/utilidades';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    areas: {
        type: Object,
        default: null
    },
})



const form = useForm({
    name: String,    
    subject: Number,
    project: Number,
    quota: Number,
    shift_id: Number,
})

const store = () => {
    form.post(route('section.store'))
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
                    contentClasses="bg-gray-400 mt-0"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                            <div v-if="form.subject != ''" class="text-xs ">{{ selectObj(form.subject, subjects) }}</div>
                            <div v-else>Elige la materia</div>
                        </button>
                    </template>
                    <template #content>
                        
                        <div class="hover:bg-slate-200 cursor-pointer" @click="form.subject = subject.id" v-for="subject in subjects" :key="subject.id">
                            {{ subject.name }}
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
                value="Materia"                 
            />
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
                        <div v-if="form.shift != null" class="text-xs ">{{ selectObj(form.shift, shifts) }}</div>
                        <div v-else>Elige el turno</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="form.shift = shift.id" v-for="shift in shifts" :key="shift.id">
                        {{ shift.name }}
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
