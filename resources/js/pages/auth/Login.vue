<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { store } from '@/routes/login';

defineProps<{
    status?: string;
}>();
</script>

<template>
    <Head title="Login" />

    <!-- CONTENEDOR GENERAL FULL -->
    <div class="min-h-screen flex bg-gray-200">

        <!-- CARD PRINCIPAL (AHORA FULL SCREEN) -->
        <div class="w-full min-h-screen bg-white flex">

            <!-- LADO IZQUIERDO -->
            <div class="w-1/2 bg-cyan-500 flex flex-col items-center justify-center text-white p-12">

                <div class="w-40 h-40 bg-white rounded-full flex items-center justify-center text-black font-bold text-lg mb-8">
                    LOGO TIENDA
                </div>

                <p class="text-lg text-center">
                    Sistema de gestión de inventario
                </p>

            </div>

            <!-- LADO DERECHO -->
            <div class="w-1/2 p-12 flex flex-col justify-center">

                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-800">
                        Iniciar sesión
                    </h1>
                    <p class="text-base text-gray-500">
                        Ingresa tus datos para continuar
                    </p>
                </div>

                <div v-if="status" class="mb-4 text-center text-base text-green-600">
                    {{ status }}
                </div>

                <Form
                    v-bind="store.form()"
                    :reset-on-success="['password']"
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
                            focus:ring-2 focus:ring-cyan-500 outline-none 
                            text-black"
                        />
                        <InputError :message="errors.email" />
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="********"
                            class="w-full px-5 py-3 text-base border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-cyan-500 outline-none 
                            text-black"
                        />
                        <InputError :message="errors.password" />
                    </div>

                    <!-- OPCIONES -->
                    <div class="flex items-center justify-between text-base">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" />
                            <span class="text-gray-600">Recordarme</span>
                        </label>

                        <Link href="/forgot-password" class="text-cyan-600 hover:underline">
                            ¿Olvidaste tu contraseña?
                        </Link>
                    </div>

                    <!-- BOTÓN -->
                    <button
                        type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white py-3 rounded-lg font-medium text-base transition"
                        :disabled="processing"
                    >
                        <span v-if="processing">Cargando...</span>
                        <span v-else>Iniciar sesión</span>
                    </button>

                </Form>

                <!-- REGISTER -->
                <div class="text-center mt-8 text-base text-gray-600">
                    ¿No tienes cuenta?
                    <Link href="/register" class="text-cyan-600 hover:underline">
                        Regístrate
                    </Link>
                </div>

            </div>

        </div>

    </div>
</template>