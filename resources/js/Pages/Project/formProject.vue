<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const responseP = await axios.get(route('indexPensum'));

const pensums = responseP.data;

var namePensum = ref(null);

function selPensum (pensum, name){
    form.pensum = pensum;

    pensums.forEach(element => {
        if (element.id == pensum) {
            namePensum = name;
        }
    });
}

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
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                        <div v-if="namePensum">{{ namePensum }}</div>
                        <div v-else>Elige el pensum</div>
                    </button>
                </template>
                <template #content>
                    
                    <div class="hover:bg-slate-200 cursor-pointer" @click="selPensum(pensum.id, pensum.name)" v-for="pensum in pensums" :key="pensum.id">
                        {{ pensum.name }}
                    </div>
                    
                    
                </template>
            </Dropdown>
           </div>

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
