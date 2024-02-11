<template>
  <Head title="Transactions"/>

  <AuthenticatedLayout>
    <template #header>
      Transactions
    </template>

    <button-action-transaction></button-action-transaction>
    <table-transactions></table-transactions>
    
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import TableTransactions from '../../Components/TableTransactions.vue';
import ButtonActionTransaction from './ButtonActionTransaction.vue';
</script>
