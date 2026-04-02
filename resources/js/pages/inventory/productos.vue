<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import SidebarLayout from '@/layouts/SidebarLayout.vue';
import { ref } from 'vue';

defineOptions({
    layout: SidebarLayout
});

defineProps<{
    productos: Array<{
        id: number;
        nombre: string;
        descripcion: string;
        precio: number;
    }>;
}>();

// FORMULARIO
const nombre = ref('');
const descripcion = ref('');
const precio = ref('');

const guardar = () => {
    router.post('/productos', {
        nombre: nombre.value,
        descripcion: descripcion.value,
        precio: precio.value
    }, {
        onSuccess: () => {
            nombre.value = '';
            descripcion.value = '';
            precio.value = '';
        }
    });
};

// MODAL ELIMINAR
const mostrarModal = ref(false);
const productoAEliminar = ref<number | null>(null);

const confirmarEliminar = (id: number) => {
    productoAEliminar.value = id;
    mostrarModal.value = true;
};

const eliminar = () => {
    if (productoAEliminar.value) {
        router.delete(`/productos/${productoAEliminar.value}`);
        mostrarModal.value = false;
        productoAEliminar.value = null;
    }
};

const cancelar = () => {
    mostrarModal.value = false;
    productoAEliminar.value = null;
};
</script>

<template>
    <Head title="Productos" />

    <div class="space-y-6">

        <!-- HEADER -->
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Productos
            </h1>
            <p class="text-sm text-gray-500">
                Gestión de inventario
            </p>
        </div>

        <!-- FORMULARIO -->
        <div class="bg-white p-6 rounded-xl shadow-md space-y-4">

            <h2 class="font-semibold text-gray-700">
                Nuevo producto
            </h2>

            <input
                v-model="nombre"
                type="text"
                placeholder="Nombre"
                class="w-full px-4 py-2 border rounded-lg text-black"
            />

            <input
                v-model="descripcion"
                type="text"
                placeholder="Descripción"
                class="w-full px-4 py-2 border rounded-lg text-black"
            />

            <input
                v-model="precio"
                type="number"
                placeholder="Precio"
                class="w-full px-4 py-2 border rounded-lg text-black"
            />

            <button
                @click="guardar"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg"
            >
                Guardar
            </button>

        </div>

        <!-- TABLA -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">Nombre</th>
                        <th class="px-4 py-3 text-left">Descripción</th>
                        <th class="px-4 py-3 text-left">Precio</th>
                        <th class="px-4 py-3 text-left">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="producto in productos"
                        :key="producto.id"
                        class="border-t hover:bg-gray-50"
                    >
                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ producto.nombre }}
                        </td>

                        <td class="px-4 py-3 text-gray-500">
                            {{ producto.descripcion || 'Sin descripción' }}
                        </td>

                        <td class="px-4 py-3 text-green-600 font-semibold">
                            ${{ producto.precio }}
                        </td>

                        <td class="px-4 py-3 flex gap-4">

                            <!-- EDITAR (a futuro) -->
                            <button class="text-blue-500">
                                Editar
                            </button>

                            <!-- ELIMINAR -->
                            <button
                                @click="confirmarEliminar(producto.id)"
                                class="text-red-500"
                            >
                                Eliminar
                            </button>

                        </td>
                    </tr>

                    <tr v-if="productos.length === 0">
                        <td colspan="4" class="text-center py-6 text-gray-500">
                            No hay productos registrados
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- MODAL ELIMINAR -->
    <div
        v-if="mostrarModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-xl p-6 w-80 shadow-lg text-center">

            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                ¿Eliminar producto?
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Esta acción no se puede deshacer
            </p>

            <div class="flex justify-center gap-4">

                <button
                    @click="cancelar"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg"
                >
                    Cancelar
                </button>

                <button
                    @click="eliminar"
                    class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg"
                >
                    Eliminar
                </button>

            </div>

        </div>
    </div>

</template>