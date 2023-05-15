<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';

const responseP = await axios.get(route('pensum.index'));

const pensums = responseP.data;

const form = useForm({
    name: '',
    pensum: '',
    lapso: '',
    fecha: ''
})

const createProject = () => {
    form.post(route('project.store'))
}
</script>

<template>
    <form @submit.prevent="createProject" class="mt-6 gap-8 grid grid-cols-2 grid-rows-3">
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
                value="Pensum"                 
            />
            
           <Dropdown>
                <template #trigger>
                    Elije un pensum
                </template>
                <template #content>
                    <div class="cursor-pointer hover:bg-slate-200" v-for="pensum in pensums" :key="pensum.id">
                        {{ pensum.name }}
                    </div>
                </template>
           </Dropdown>

            <InputError class="mt-2" :message="form.errors.pensum" />
        </div>
        <div class="">
            <InputLabel                
                value="Lapso"                 
            />
            
            <TextInput
                class=""
                type="text"
                v-model="form.lapso" 
                required
            />

            <InputError class="mt-2" :message="form.errors.lapso" />
        </div>
        <div class="">
            <InputLabel                
                value="Fecha"                 
            />
            
            <TextInput
                class=""
                v-model="form.fecha" 
                type="date"
                required
            />

            <InputError class="mt-2" :message="form.errors.fecha" />
        </div>
        <div class="">
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
