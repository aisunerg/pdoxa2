<script setup>
    import Dropdown from '@/Components/Dropdown.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { useForm } from '@inertiajs/vue3';
    import { selectObj, store } from "@/utilidades";


    const props = defineProps({
            schemeday:{
                type:Object,
                default:null
            }
        });

    const days = [
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo',
    ]

    const form = useForm({
        number: '',
        name: '',
        schemeday: props.schemeday.id
    })

    if (props.subject) {
        form.subject = props.subject.id;
    }

    const create = () => {
        form.post(route('day.store'))
    }
</script>

<template>
    <form @submit.prevent="create" class="mt-2 bg-slate-200 p-2 rounded-lg mr-20">
        <div class="flex flex-row gap-2 content-center">
            <div class="">
                <InputLabel                
                    value="Esquema de Dia"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.name"
                    :value="schemeday.name"
                    type="text" 
                    required
                    readonly
                />
                

                <InputError class="mt-2" :message="form.errors.schemeday" />
            </div>

            <div class="">
                <InputLabel                
                    value="Numero"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.number"
                    type="number" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.number" />
            </div>

            <div class="">
                <InputLabel                
                    value="Dia"                 
                />
                
            <div class="">
                <Dropdown contentClasses="bg-gray-400" align="left">
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                            <div v-if="form.name != ''">{{ form.name }}</div>
                            <div v-else>Selecciona</div>
                        </button>
                    </template>
                    <template #content>                    
                        <div class="hover:bg-slate-200 cursor-pointer" v-for="day in days" @click="form.name = day">
                            {{ day }}
                        </div>                                    
                    </template>
                </Dropdown>
            </div>

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            
            <div class=" p-5 ">
                    
                <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Crear
                </PrimaryButton>
                
            </div>
        </div>
    </form>
    
</template>
