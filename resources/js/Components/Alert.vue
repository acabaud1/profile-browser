<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const alert = computed(() => usePage().props.flash.alert);

const alertStyle = {
    color: alert.type == 'error' ? 'bg-red-400' : 'bg-green-400',
    icon: alert.type == 'error' ?
        'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z' :
        'M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z'
};

</script>

<template>
    <div v-if="alert" class="transition duration-150 ease-in-out text-center py-3 lg:px-4 absolute top-0 left-1/2 transform -translate-x-1/2">
        <div :class="alertStyle.color" class="p-2 items-center text-white leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 fill-current opacity-75">
                    <path fill-rule="evenodd" :d="alertStyle.icon" clip-rule="evenodd" />
                </svg>
            </span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ alert.message }}</span>
        </div>
    </div>
</template>