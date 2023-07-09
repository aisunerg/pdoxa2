<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { selectObj, store } from "@/utilidades";
import InputSelect from '@/Components/myComponents/InputSelect.vue';

    const props = defineProps({
        departaments: {
            type: Object,
            default: null
        },
        pensums: {
            type: Object,
            default: null
        },
        pensum: {
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

    if (props.pensum) {
        form.pensum = props.pensum.id 
    }
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

        <div v-if="pensums" class="">
            <InputLabel                
                value="Pensum"                 
            />
            
           <div class="">
            
            <InputSelect 
                v-model="form.pensum"
                :options="pensums"
                propName="name"
                propValue="id"
            />
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
            <InputSelect 
                v-model="form.departament"
                :options="departaments"
                propName="name"
                propValue="id"
            />
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
