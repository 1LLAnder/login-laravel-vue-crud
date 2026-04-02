import { createInertiaApp } from '@inertiajs/vue3';
import { initializeTheme } from '@/composables/useAppearance';
import AppLayout from '@/layouts/AppLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),

    layout: (name) => {
        switch (true) {
            case name.startsWith('auth/'):
                return null;
            case name.startsWith('settings/'):
                return AppLayout;
            default:
                return AppLayout;
        }
    },

    progress: {
        color: '#4B5563',
    },
});

initializeTheme();