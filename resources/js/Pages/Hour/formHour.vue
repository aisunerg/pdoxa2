<script setup>
    import Dropdown from '@/Components/Dropdown.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { useForm } from '@inertiajs/vue3';
    import { selectObj, store } from "@/utilidades";


    const props = defineProps({
            schemehour:{
                type:Object,
                default:null
            },
            shifts:{
                type:Object,
                default:null
            },
        });

    const placeholder = ""

    const form = useForm({
        number: '',
        start: '00:00:00',
        end: '00:00:00',
        shift: '',
        schemehour: props.schemehour.id
    })

    if (props.subject) {
        form.subject = props.subject.id;
    }
 

    const create = () => {
        form.post(route('hour.store'), {
            onFinish: () => form.reset('number', 'start', 'end', 'shift'),
        })
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
                    v-model="placeholder"
                    :value="schemehour.name"
                    type="text" 
                    required
                    readonly
                />
                

                <InputError class="mt-2" :message="form.errors.schemehour" />
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
                    value="Inicio"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.start"
                    type="text" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.start" />
            </div>

            <div class="">
                <InputLabel                
                    value="Fin"                 
                />
                
                <TextInput
                    class=""
                    v-model="form.end"
                    type="text" 
                    required
                />

                <InputError class="mt-2" :message="form.errors.end" />
            </div>

            <div class="">
                <InputLabel                
                    value="Turno"                 
                />
                
            <div class="">
                <Dropdown contentClasses="bg-gray-400" align="left">
                    <template #trigger>
                        <button type="button" class="p-1 border w-48 bg-white text-left rounded-lg">
                            <div v-if="form.shift != ''">{{ selectObj(form.shift, shifts) }}</div>
                            <div v-else>Selecciona</div>
                        </button>
                    </template>
                    <template #content>                    
                        <div class="hover:bg-slate-200 cursor-pointer" v-for="shift in shifts" @click="form.shift = shift.id">
                            {{ shift.name }}
                        </div>                                    
                    </template>
                </Dropdown>
            </div>

                <InputError class="mt-2" :message="form.errors.shift" />
            </div>
            
        </div>
        <div class="p-5 justify-end">
            <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Crear
            </PrimaryButton>
        </div>
    </form>
    
</template>
