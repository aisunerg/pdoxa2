<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const responseP = await axios.get(route('indexArea'));

const areas = responseP.data;

var nameArea = ref(null);

function selArea (area, name){
    form.area = area;

    areas.forEach(element => {
        if (element.id == area) {
            nameArea = name;
        }
    });
}

const form = useForm({
    name: '',
    code: '',
    area: '',
})

const createPensum = () => {
    form.post(route('career.store'))
}
</script>

<template>
    <form @submit.prevent="createPensum" class="mt-6 pt-5 grid grid-rows-2 gap-4 bg-slate-200 p-2 rounded-lg mr-20">
        <div class="grid grid-cols-3">
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
                    value="Codigo"                 
                />
                
                <TextInput
                    class=""
                    type="text"
                    v-model="form.code" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.lapso" />
            </div>

            <div class="">
                <InputLabel                
                    value="Area"                 
                />
                
                <div class="">
                    <Dropdown
                        contentClasses="bg-gray-400"
                        align="left" 
                    >
                        <template #trigger>
                            <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                                <div v-if="nameArea" class="truncate">{{ nameArea }}</div>
                                <div v-else>Elige el Area</div>
                            </button>
                        </template>
                        <template #content>                            
                            <div class="hover:bg-slate-200 cursor-pointer" @click="selArea(area.id, area.name)" v-for="area in areas" :key="area.id">
                                {{ area.name }}
                            </div>
                        </template>
                    </Dropdown>
                </div>

                <InputError class="mt-2" :message="form.errors.pensum" />
            </div>

            
        </div>
        
        <div class="flex justify-end">
            <div class="mr-4">

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear
                </PrimaryButton>
            </div>
        </div>
    </form>
    
</template>
