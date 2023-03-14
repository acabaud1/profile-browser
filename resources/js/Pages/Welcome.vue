<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    stars: Array
});

const selectedStar = ref(props.stars[0]);

</script>

<template>
    <Head title="Welcome" />

    <div class="container p-2 mx-auto">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="flex flex-row flex-wrap py-4">
            <aside class="w-full sm:w-1/3 md:w-1/4">
                <div class="sticky top-0 p-4 bg-white rounded-xl w-full">
                    <ul class="nav flex flex-col overflow-hidden">
                        <h1 class="text-xl pb-5 font-bold">Profile Browser</h1>

                        <select v-model="selectedStar" class="sm:hidden">
                            <option v-for="(star, i) in stars" v-bind:key="i" :value="star">
                                {{ star.firstname + ' ' + star.lastname }}
                            </option>
                        </select>

                        <li v-for="(star, i) in stars" v-bind:key="i"
                            class="nav-item pb-3 hidden sm:block"
                            @click="selectedStar = star">

                            <img :src="star.image_url" class="w-5 h-5 rounded-full inline-block mr-2" />
                            <span class="nav-link text-purple-800 hover:text-purple-600 cursor-pointer align-middle truncate">
                                {{ star.firstname + ' ' + star.lastname }}
                            </span>
                        </li>

                        <p v-if="!stars.length">
                            There are no stars registered yet.<br/>
                            Start adding more from the <Link :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900">dashboard</Link> ;)
                        </p>
                    </ul>
                </div>
            </aside>
            <main role="main" class="w-full sm:w-2/3 md:w-3/4 p-4">
                <div v-if="selectedStar">
                    <div class="flex items-center">
                        <img :src="selectedStar.image_url" class="w-24 h-24 rounded-full" />
                        <h2 class="text-2xl font-bold pl-5">{{ selectedStar.firstname + ' ' + selectedStar.lastname }}</h2>
                    </div>
                    <p class="mt-5">{{ selectedStar.description }}</p>
                </div>
            </main>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
