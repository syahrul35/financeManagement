<template>
  <Head title="Setting"/>

  <AuthenticatedLayout>
    <template #header>
      Setting
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xl">
      This is Setting page
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
