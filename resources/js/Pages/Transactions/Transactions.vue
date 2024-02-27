<template>
  <Head title="Transactions"/>

  <AuthenticatedLayout>
    <template #header>
      Transactions
    </template>

    <div id="table" class="bg-gray-50 shadow-lg rounded-xl min-w-full">
      <div class="m-2">
        <ButtonActionTransaction :categories="categories"></ButtonActionTransaction>
        <TableTransactions></TableTransactions>
      </div>
    </div>
    
  </AuthenticatedLayout>
</template>

<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, useForm } from '@inertiajs/vue3';
  import { onMounted } from 'vue';

  import TableTransactions from '../../Partials/TransactionsTable/TableTransactions.vue';
  import ButtonActionTransaction from './ButtonActionTransaction.vue';

  const props = defineProps({
    categories: Array
  })
</script>
