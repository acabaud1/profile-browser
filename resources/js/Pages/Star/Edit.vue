<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    star: Object
});

const isCreate = computed(() =>
    props.star.id ? false : true
);

const form = useForm({
    firstname: props.star ? props.star.firstname : null,
    lastname: props.star ? props.star.lastname : null,
    image: null,
    description: props.star ? props.star.description : null
});

</script>

<template>
    <Head title="Star" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span v-if="isCreate">Create new Star</span>
                <span v-else>Edit Star</span>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <section>
                        <form 
                            @submit.prevent="isCreate ? 
                                form.post(route('stars.store')) : 
                                form.transform((data) => ({
                                    ...data,
                                    _method: 'patch'
                                })).post(route('stars.update', props.star))" 
                            class="space-y-6"
                        >
                            <div>
                                <InputLabel for="firstname" value="First name" />

                                <TextInput
                                    id="firstname"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.firstname"
                                    required
                                    autocomplete="firstname"
                                />

                                <InputError class="mt-2" :message="form.errors.firstname" />
                            </div>

                            <div>
                                <InputLabel for="lastname" value="Last name" />

                                <TextInput
                                    id="lastname"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.lastname"
                                    required
                                    autocomplete="lastname"
                                />

                                <InputError class="mt-2" :message="form.errors.lastname" />
                            </div>

                            <div>
                                <InputLabel for="image" value="Image" />

                                <a v-if="!isCreate && star.image_url" :href="star.image_url" target="_blank">
                                    <img :src="star.image_url" style="max-width: 150px;" />
                                </a>

                                <input class="mt-1 block w-full" id="image" type="file" @input="form.image = $event.target.files[0]">
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100"></progress>

                                <InputError class="mt-2" :message="form.errors.image" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Description" />

                                <TextInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                    autocomplete="description"
                                />

                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
