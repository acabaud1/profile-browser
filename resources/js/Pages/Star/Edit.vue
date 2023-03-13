<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    star: Object
});

const form = useForm({
    firstname: props.star ? props.star.firstname : null,
    lastname: props.star ? props.star.lastname : null,
    image: props.star ? props.star.image : null,
    description: props.star ? props.star.description : null
});
</script>

<template>
    <Head title="Star" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Star</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <section>
                        <form @submit.prevent="form.patch(route('star.update'))" class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="firstname" value="First name" />

                                <TextInput
                                    id="firstname"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.firstname"
                                    required
                                    autofocus
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

                                <TextInput
                                    id="image"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.image"
                                    required
                                    autocomplete="image"
                                />

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
