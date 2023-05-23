<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const responseP = await axios.get(route('indexCareer'));

const careers = responseP.data;

var nameCareer = ref(null);

function selPensum (career, name){
    form.career = career;

    careers.forEach(element => {
        if (element.id == career) {
            nameCareer = name;
        }
    });
}

const form = useForm({
    name: '',
    career: '',
    regime: '',
})

const createPensum = () => {
    form.post(route('pensum.store'))
}
</script>

<template>
    <form @submit.prevent="createPensum" class="mt-6 grid grid-rows-2 ">
        <div class="grid grid-cols-2 grid-rows-3 gap-8">
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
                    value="Carrera"                 
                />
                
            <div class="">
                <Dropdown
                    contentClasses="bg-gray-400"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                            <div v-if="nameCareer">{{ nameCareer }}</div>
                            <div v-else>Elige el pensum</div>
                        </button>
                    </template>
                    <template #content>
                        
                        <div class="hover:bg-slate-200 cursor-pointer" @click="selPensum(career.id, career.name)" v-for="career in careers" :key="career.id">
                            {{ career.name }}
                        </div>
                        
                        
                    </template>
                </Dropdown>
            </div>

                <InputError class="mt-2" :message="form.errors.pensum" />
            </div>
            <div class="">
                <InputLabel                
                    value="Regimen"                 
                />
                
                <TextInput
                    class=""
                    type="text"
                    v-model="form.regime" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.lapso" />
            </div>
        </div>
        
        <div class="flex justify-end">
            <div class="pr-72">

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear
                </PrimaryButton>
            </div>
        </div>
    </form>
    
</template>
