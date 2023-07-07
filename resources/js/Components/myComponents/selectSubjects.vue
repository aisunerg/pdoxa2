<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    options: {
        type: Object,
    },
    placeholder: {
        type: String,
        default: "Seleccione"
    },
    propName: {
        type: String,
        required: true,
    },
    propValue: {
        type: String,
        required: true,
    },
    
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

const semestres =  [...new Set(props.options.map(item => item.level))];



</script>

<template>
    <div>
        <!-- class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md p-1" -->
        <!-- block   p-1 text-sm    -->
        <select
            class="form-select  w-48 h-9 rounded-md border-gray-300 focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:shadow-outline-purple"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
            required
        >
            <option value="" disabled selected hidden>{{ placeholder }}</option>
            <optgroup v-for="semestre in semestres" :label="'Semestre - '+semestre">
                <option v-for="aOption in options.filter(e => e.level == semestre)"  :value="aOption[propValue]">{{ aOption[propName] }}</option>
            </optgroup>
        </select>

    </div>
</template>
