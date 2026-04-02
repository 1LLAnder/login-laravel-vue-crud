<script setup lang="ts">
const { breadcrumbs = [] } = defineProps<{
    breadcrumbs?: any[];
}>();
</script>

<template>
    <div class="min-h-screen bg-white text-black">
        <slot />
    </div>
</template>