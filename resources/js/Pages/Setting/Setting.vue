<template>
  <Head title="Setting"/>

  <AuthenticatedLayout>
    <template #header>
      Setting
    </template>

    <div class="bg-gray-50 shadow-lg rounded-xl min-w-full">
      <div class="m-2">
        <Category></Category>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Category from '../../Partials/Category/Category.vue';
</script>
