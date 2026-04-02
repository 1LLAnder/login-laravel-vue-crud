<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { email } from '@/routes/password';

defineProps<{
    status?: string;
}>();
</script>

<template>
    <Head title="Recuperar contraseña" />

    <!-- CONTENEDOR FULL -->
    <div class="min-h-screen flex bg-gray-200">

        <!-- CONTENIDO FULL -->
        <div class="w-full min-h-screen bg-white flex">

            <!-- IZQUIERDA -->
            <div class="w-1/2 bg-cyan-500 flex flex-col items-center justify-center text-white p-12">

                <div class="w-40 h-40 bg-white rounded-full flex items-center justify-center text-black font-bold text-lg mb-8">
                    LOGO TIENDA
                </div>

                <p class="text-lg text-center">
                    Recupera el acceso a tu cuenta
                </p>

            </div>

            <!-- DERECHA -->
            <div class="w-1/2 p-12 flex flex-col justify-center">

                <!-- TITULO -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">
                        Recuperar contraseña
                    </h1>
                    <p class="text-base text-gray-500">
                        Ingresa tu correo para recibir el enlace
                    </p>
                </div>

                <!-- MENSAJE -->
                <div v-if="status" class="mb-4 text-center text-base text-green-600">
                    {{ status }}
                </div>

                <!-- FORM -->
                <Form
                    v-bind="email.form()"
                    v-slot="{ errors, processing }"
                    class="space-y-6"
                >

                    <!-- EMAIL -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Correo electrónico
                        </label>
                        <input
                            type="email"
                            name="email"
                            required
                            autofocus
                            placeholder="correo@ejemplo.com"
                            class="w-full px-5 py-3 text-base border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-cyan-500 outline-none text-black"
                        />
                        <InputError :message="errors.email" />
                    </div>

                    <!-- BOTON -->
                    <button
                        type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white py-3 rounded-lg font-medium text-base transition"
                        :disabled="processing"
                    >
                        <span v-if="processing">Enviando...</span>
                        <span v-else>Enviar enlace</span>
                    </button>

                </Form>

                <!-- LOGIN -->
                <div class="text-center mt-8 text-base text-gray-600">
                    ¿Recordaste tu contraseña?
                    <Link href="/login" class="text-cyan-600 hover:underline">
                        Iniciar sesión
                    </Link>
                </div>

            </div>

        </div>

    </div>
</template>