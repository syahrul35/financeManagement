<template>
  <Head title="Transactions"/>

  <AuthenticatedLayout>
    <template #header>
      Transactions
    </template>

    <div id="table" class="bg-gray-50 shadow-lg rounded-xl min-w-full">
      <div class="m-2">
        <button-action-transaction></button-action-transaction>
        <table-transactions></table-transactions>
      </div>
    </div>
    
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import TableTransactions from '../../Components/TableTransactions.vue';
import ButtonActionTransaction from './ButtonActionTransaction.vue';
</script>
