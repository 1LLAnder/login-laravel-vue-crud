<script setup lang="ts">
import { Form, Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import InputError from '@/components/InputError.vue';
import SidebarLayout from '@/layouts/SidebarLayout.vue';

defineOptions({
    layout: SidebarLayout
});

const page = usePage<{
    props: {
        auth: {
            user: {
                name: string;
                email: string;
            };
        };
        flash?: {
            success?: string;
        };
    };
}>();

const user = computed(() => page.props.auth.user);
const flash = computed(() => page.props.flash?.success);
</script>

<template>
    <Head title="Perfil" />

    <div class="max-w-xl">

        <!-- TITULO -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Perfil
        </h1>

        <!-- MENSAJE DE EXITO -->
        <div
            v-if="flash"
            class="mb-4 text-green-600 text-sm text-center"
        >
            {{ flash }}
        </div>

        <!-- FORM -->
        <div class="bg-white p-6 rounded-xl shadow-md">

            <Form
                method="post"
                action="/profile/update"
                v-slot="{ errors, processing }"
                class="space-y-5"
            >

                <!-- NAME -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">
                        Nombre
                    </label>
                    <input
                        type="text"
                        name="name"
                        :value="user?.name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                        focus:ring-2 focus:ring-blue-400 outline-none text-black"
                    />
                    <InputError :message="errors.name" />
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="block text-sm text-gray-700 mb-1">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        :value="user?.email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                        focus:ring-2 focus:ring-blue-400 outline-none text-black"
                    />
                    <InputError :message="errors.email" />
                </div>

                <!-- BOTON -->
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg"
                    :disabled="processing"
                >
                    <span v-if="processing">Guardando...</span>
                    <span v-else>Guardar cambios</span>
                </button>

            </Form>

        </div>

    </div>
</template>