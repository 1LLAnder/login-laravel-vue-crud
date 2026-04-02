<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import SidebarLayout from '@/layouts/SidebarLayout.vue';

defineOptions({
    layout: SidebarLayout
});

const page = usePage();

// usuario
const user = computed(() => page.props.auth.user);

// productos (dinámico)
const totalProductos = computed(() => page.props.totalProductos ?? 0);
</script>

<template>
    <Head title="Dashboard" />

    <div class="space-y-6">

        <!-- BIENVENIDA -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Bienvenido, {{ user?.name }}
            </h1>
            <p class="text-sm text-gray-500">
                Este es el panel principal del sistema de inventario.
            </p>
        </div>

        <!-- TARJETAS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- PRODUCTOS -->
            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-gray-500">Productos registrados</p>
                <p class="text-3xl font-bold text-blue-600">
                    {{ totalProductos }}
                </p>
            </div>

            <!-- ESTADO -->
            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-gray-500">Estado del sistema</p>
                <p class="text-green-500 font-semibold">
                    Operativo
                </p>
            </div>

            <!-- USUARIO -->
            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-sm text-gray-500">Usuario activo</p>
                <p class="text-gray-800 font-semibold">
                    {{ user?.email }}
                </p>
            </div>

        </div>

        <!-- INFO -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                Información
            </h2>
            <p class="text-gray-600 text-sm">
                Desde este panel puedes gestionar los productos del sistema,
                revisar información general y administrar tu cuenta.
            </p>
        </div>

    </div>
</template>