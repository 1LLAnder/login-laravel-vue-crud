<script setup lang="ts">
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

const logout = () => {
    router.post('/logout');
};

const isActive = (url: string) => {
    return page.url.startsWith(url);
};
</script>

<template>
    <div class="min-h-screen flex bg-gray-50">

        <aside class="w-64 bg-gray-900 text-white p-6 flex flex-col justify-between">

            <div>

                <h2 class="text-xl font-bold mb-6">
                    Tai Loy - Panel Admin
                </h2>

                <div class="mb-6">
                    <p class="text-sm text-gray-400">Bienvenido</p>
                    <p class="font-semibold">
                        {{ user?.name }}
                    </p>
                </div>

                <!-- PRINCIPAL -->
                <div class="mb-4">
                    <p class="text-xs text-gray-400 mb-2 uppercase">
                        Principal
                    </p>

                    <Link
                        href="/dashboard"
                        :class="[
                            'block px-3 py-2 rounded-lg transition',
                            isActive('/dashboard')
                                ? 'bg-blue-500 text-white'
                                : 'text-gray-300 hover:bg-gray-800'
                        ]"
                    >
                        Dashboard
                    </Link>
                </div>

                <!-- INVENTARIO -->
                <div class="mb-4">
                    <p class="text-xs text-gray-400 mb-2 uppercase">
                        Inventario
                    </p>

                    <Link
                        href="/productos"
                        :class="[
                            'block px-3 py-2 rounded-lg transition',
                            isActive('/productos')
                                ? 'bg-blue-500 text-white'
                                : 'text-gray-300 hover:bg-gray-800'
                        ]"
                    >
                        Productos
                    </Link>
                </div>

                <!-- USUARIO -->
                <div>
                    <p class="text-xs text-gray-400 mb-2 uppercase">
                        Usuario
                    </p>

                    <Link
                        href="/settings/profile"
                        :class="[
                            'block px-3 py-2 rounded-lg transition',
                            isActive('/settings/profile')
                                ? 'bg-blue-500 text-white'
                                : 'text-gray-300 hover:bg-gray-800'
                        ]"
                    >
                        Perfil
                    </Link>
                </div>

            </div>

            <button
                @click="logout"
                class="bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg mt-6 transition"
            >
                Cerrar sesión
            </button>

        </aside>

        <main class="flex-1 p-6">
            <slot />
        </main>

    </div>
</template>