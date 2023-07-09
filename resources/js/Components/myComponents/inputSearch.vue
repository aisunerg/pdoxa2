<script setup>
import { computed, onMounted, ref } from 'vue';

const props = defineProps({
    
    align: {
        type: String,
        default: 'left',
    },
    width: {
        type: String,
        default: '48',
    },
    options: {
        type: Object,
        default: null
    },
    propName: {
        type: String,
        required: true,
    },
    propValue: {
        type: String,
        required: true,
    },
    defaultValue: {
        type: String,
        default: null,
    },
});

let searchQuery = ref(null);
let open = ref(false);

const emits = defineEmits(['enviarID']);

function manipula(obj) {
    open.value = false;
    searchQuery = obj.name;
    //si searchquery == '' obj.id = null
    emits('enviarID', obj.id);
}


const filteredResults = computed(() => {
  if (searchQuery.value != null) {
    return props.options.filter(option => {
      return option.name.toLowerCase().includes(searchQuery.value.toLowerCase());
    });
  } else {
    return props.options;
  }
});

const widthClass = computed(() => {
    return {
        48: 'w-48',
    }[props.width.toString()];
});

const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'origin-top-left left-0';
    } else if (props.align === 'right') {
        return 'origin-top-right right-0';
    } else {
        return 'origin-top';
    }
});

if (props.defaultValue) {
    let varia = props.options.find((o => o.id == props.defaultValue)) ;
    searchQuery.value = varia.name;    
}

</script>

<template>

    <div class="relative">
        <!-- <input type="text" v-model="searchQuery"> -->

        <div class="flex justify-center ">
            <div
                class="w-full focus-within:text-purple-500"
            >
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                    <path
                        fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <input
                v-model="searchQuery"
                @click="open = true"
                @focus="open = true"
                @blur="open = false"
                class=" w-48 pl-8 pr-3 p-2 text-sm rounded-md text-gray-700 placeholder-gray-600 bg-white border-1 ring-2 ring-gray-200 border-gray-200 focus:placeholder-gray-500 focus:ring-purple-400 focus:border-purple-400"
                type="text"
                placeholder="Buscar"
                aria-label="Search"
            />
            </div>
        </div>
        
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 w-full top-10"
                :class="[widthClass, alignmentClasses]"
            >
                <div class="max-h-72 p-0 overflow-x-auto ring-1 ring-gray-700 ring-opacity-4 select-none bg-slate-50 origin-top-left left-0">
                    <div v-for="option in filteredResults" class="p-0.5 cursor-pointer hover:bg-blue-500 hover:text-white" @click="manipula(option)">
                        {{option.name}}
                    </div>
                </div>
            </div>
            
        </transition>

        <div
            v-if="filteredResults.length == 0 && searchQuery != null"
            class="absolute z-50 w-full"
            :class="[widthClass, alignmentClasses]"
        >
            <div class=" px-0 overflow-x-auto select-none rounded-sm ring-1 ring-purple-500 bg-slate-200 p-2 origin-top-left left-0">
                <div class="p-0.5 cursor-pointer">
                    Sin Resultados
                </div>
            </div>
        </div>
    </div>
    

</template>
