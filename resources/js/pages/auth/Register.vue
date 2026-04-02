<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { store } from '@/routes/register';
</script>

<template>
    <Head title="Registro" />

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
                    Crea tu cuenta para gestionar el inventario
                </p>

            </div>

            <!-- DERECHA -->
            <div class="w-1/2 p-12 flex flex-col justify-center">

                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-800">
                        Crear cuenta
                    </h1>
                    <p class="text-base text-gray-500">
                        Completa tus datos para registrarte
                    </p>
                </div>

                <Form
                    v-bind="store.form()"
                    :reset-on-success="['password', 'password_confirmation']"
                    v-slot="{ errors, processing }"
                    class="space-y-6"
                >

                    <!-- NOMBRE -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Nombre completo
                        </label>
                        <input
                            type="text"
                            name="name"
                            required
                            autofocus
                            placeholder="Tu nombre"
                            class="w-full px-5 py-3 text-base border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-cyan-500 outline-none text-black"
                        />
                        <InputError :message="errors.name" />
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Correo electrónico
                        </label>
                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="correo@ejemplo.com"
                            class="w-full px-5 py-3 text-base border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-cyan-500 outline-none text-black"
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
                            focus:ring-2 focus:ring-cyan-500 outline-none text-black"
                        />
                        <InputError :message="errors.password" />
                    </div>

                    <!-- CONFIRM -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 mb-2">
                            Confirmar contraseña
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="********"
                            class="w-full px-5 py-3 text-base border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-cyan-500 outline-none text-black"
                        />
                        <InputError :message="errors.password_confirmation" />
                    </div>

                    <!-- BOTON -->
                    <button
                        type="submit"
                        class="w-full bg-cyan-500 hover:bg-cyan-600 text-white py-3 rounded-lg font-medium text-base transition"
                        :disabled="processing"
                    >
                        <span v-if="processing">Creando...</span>
                        <span v-else>Crear cuenta</span>
                    </button>

                </Form>

                <!-- LOGIN -->
                <div class="text-center mt-8 text-base text-gray-600">
                    ¿Ya tienes cuenta?
                    <Link href="/login" class="text-cyan-600 hover:underline">
                        Iniciar sesión
                    </Link>
                </div>

            </div>

        </div>

    </div>
</template>