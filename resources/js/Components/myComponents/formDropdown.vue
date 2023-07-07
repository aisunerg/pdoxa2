<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';
import Dropdown from "@/Components/Dropdown.vue";

const props = defineProps({
    align: {
        type: String,
        default: 'right',
    },
    width: {
        type: String,
        default: '48',
    },
    contentClasses: {
        type: String,
        default: 'py-1 bg-white',
    },
});

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

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

const open = ref(false);
</script>

<template>
    <div class="relative">
        <div @click="open = !open" class="cursor-pointer items-center w-full bg-slate-200 border-black rounded-t-lg p-2 hover:text-black text-slate-700 stroke-slate-700 hover:stroke-black">
            <div class="inline font-medium "><slot name="trigger" /></div>
            <div class="inline">
                <svg class="w-4 h-4 inline " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g id="Complete">
                        <g id="add-square">
                            <g>
                                <rect data-name="--Rectangle" fill="none" height="20" id="_--Rectangle" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="20" x="2" y="2"/>
                                <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="15.5" x2="8.5" y1="12" y2="12"/>
                                <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="15.5" y2="8.5"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40 cursor-alias" @click="open = false"></div>

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
                class="absolute z-50 w-full"
                :class="[widthClass, alignmentClasses]"
                style="display: none"
                
            >
                <div class="rounded-b-md ring-1 ring-black ring-opacity-5 select-none bg-slate-200 p-2">
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>
