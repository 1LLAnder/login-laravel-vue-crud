<script setup lang="ts">
const { title = '', description = '' } = defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="min-h-screen bg-gray-100">

        <div class="w-full max-w-5xl mx-auto px-4 py-10">

            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ title }}
                </h1>
                <p class="text-gray-500 text-sm">
                    {{ description }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md">
                <slot />
            </div>

        </div>

    </div>
</template>