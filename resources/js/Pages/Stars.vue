<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const deleteForm = useForm({});
const deleteStar = (id) => {
    if(confirm("Are you sure you want to delete this star ?")) {
        deleteForm.delete(route('stars.destroy', id));
    }
};

defineProps({
    stars: Array
});
</script>

<template>
    <Head title="Stars" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Stars</h2>

                <Link :href="route('stars.create')" class="ml-auto">
                    <PrimaryButton type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                        </svg>
                        <span class="pl-2">Create</span>
                    </PrimaryButton>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <table v-if="stars.length" class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-slate-400 text-left">ID</th>
                                <th class="border-b font-medium p-4 pt-3 pb-3 text-slate-400 text-left">Prénom</th>
                                <th class="border-b font-medium p-4 pt-3 pb-3 text-slate-400 text-left">Nom</th>
                                <th class="border-b font-medium p-4 pt-3 pb-3 text-slate-400 text-left">Image</th>
                                <th class="border-b font-medium p-4 pr-8 pt-3 pb-3 text-slate-400 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="(star, i) in stars" :key="i">
                                <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ star.id }}</td>
                                <td class="border-b border-slate-100 p-4 text-slate-500">{{ star.firstname }}</td>
                                <td class="border-b border-slate-100 p-4 text-slate-500">{{ star.lastname }}</td>
                                <td class="border-b border-slate-100 p-4 text-slate-500">{{ star.image_url }}</td>
                                <td class="border-b border-slate-100 p-4 pr-8 text-slate-500">

                                    <Link :href="route('stars.edit', star.id)">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                            </svg>
                                        </button>
                                    </Link>

                                    <button
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                        @click="deleteStar(star.id)"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div v-else>
                        <p class="p-5">
                            There's no star for the moment. Want to <Link :href="route('stars.create')" class="text-blue-600 hover:underline">create a new one</Link> ?
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>