<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    description: '',
    modality: '',
})

const create = () => {
    form.post(route('classroom_type.store'))
}
</script>

<template>
    <form @submit.prevent="create" class="mt-2  bg-slate-200 p-2 rounded-lg mr-20">
        <div class="flex flex-row content-center gap-4">
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
                    value="Descripcion"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.description"
                    type="text" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            
            <div class="">
                <InputLabel                
                    value="Modalidad"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.modality"
                    type="number" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.modality" />
            </div>
            
            <div class=" p-5 ">
                    
                <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear
                </PrimaryButton>
                
            </div>
        </div>
    </form>
    
</template>
