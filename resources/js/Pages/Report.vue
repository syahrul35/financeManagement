<template>
  <Head title="Report"/>

  <AuthenticatedLayout>
    <template #header>
      Report
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xl">
      Sample static text page
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
