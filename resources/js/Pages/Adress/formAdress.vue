<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    areas: {
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
    name: '',    
    area: '',    
})

const createProject = () => {
    form.post(route('adress.store'))
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
                value="Area"                 
            />
            
           <div class="">
            <Dropdown
                contentClasses="bg-gray-400 mt-0"
                align="left" 
            >
                <template #trigger>
                    <button type="button" class="p-1 border w-48 bg-white text-left rounded-md shadow-lg">
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
            
            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
