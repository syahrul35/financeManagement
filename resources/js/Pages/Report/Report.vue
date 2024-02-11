<template>
  <Head title="Report"/>

  <AuthenticatedLayout>
    <template #header>
      Report
    </template>

    <table-transactions></table-transactions>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import TableTransactions from '../../Components/TableTransactions.vue';
</script>
