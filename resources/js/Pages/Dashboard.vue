<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <template #header>
      Dashboard
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xl mb-4">
      Welcome back, {{ $page.props.auth.user.name }}!
    </div>

    <div class="mb-4">
      <a href="/transactions">
        <button class="flex flex-row items-center bg-indigo-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none shadow-xl min-w-full">
            <span class="ml-1 text-sm">New Transaction</span>
        </button>
      </a>
    </div>

    <Calendar/>

  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import Calendar from '@/Components/Calendar.vue';
</script>
