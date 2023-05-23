<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

const responseP = await axios.get(route('indexUser'));

const users = responseP.data;

var nameUser = ref(null);

function selUser (user, name){
    form.user = user;

    users.forEach(element => {
        if (element.id == user) {
            nameUser = name;
        }
    });
}

const form = useForm({
    name: '',
    user: '',
})

const createArea = () => {
    form.post(route('area.store'))
}
</script>

<template>
    <form @submit.prevent="createArea" class="mt-6 flex flex-row items-end p-4 rounded-lg bg-slate-200">
        <div class="flex flex-row gap-4">
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
                    value="Usuario"                 
                />
                
            <div class="">
                <Dropdown
                    contentClasses="bg-gray-400"
                    align="left" 
                >
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                            <div v-if="nameUser">{{ nameUser }}</div>
                            <div v-else>Elige el Usuario</div>
                        </button>
                    </template>
                    <template #content>
                        
                        <div class="hover:bg-slate-200 cursor-pointer" @click="selUser(user.id, user.name)" v-for="user in users" :key="user.id">
                            {{ user.name }}
                        </div>
                        
                        
                    </template>
                </Dropdown>
            </div>

                <InputError class="mt-2" :message="form.errors.pensum" />
            </div>
        </div>
        
        <div class="flex justify-end">
            <div class="">

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear
                </PrimaryButton>
            </div>
        </div>
    </form>
    
</template>
