<template>
  <Head title="Transactions"/>

  <AuthenticatedLayout>
    <template #header>
      Transactions
    </template>

    <Balance :balance="balance"></Balance>

    <div id="table" class="bg-gray-50 shadow-lg rounded-xl min-w-full">
      <div class="m-2">
        <div class="flash-message-container mb-2">
          <flashmessage
            v-if="$page.props.flash.message"
            :message="$page.props.flash.message.message"
            :type="$page.props.flash.message.type"
          />
        </div>
        <ButtonActionTransaction :categories="categories" :userId="userId" :transactions="transactions" @sort="sortTransactions"></ButtonActionTransaction>
        <TableTransactions :transactions="sortedTransactions" :categories="categories" :userId="userId"></TableTransactions>
      </div>
    </div>
    
  </AuthenticatedLayout>
</template>

<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, useForm } from '@inertiajs/vue3';
  import { ref, onMounted, defineProps, watchEffect } from 'vue';

  import TableTransactions from '../../Partials/TransactionsTable/TableTransactions.vue';
  import ButtonActionTransaction from './ButtonActionTransaction.vue';
  import Flashmessage from '@/Components/Flashmessage.vue';
  import Balance from '@/Components/Balance.vue';

  const props = defineProps({
    categories: Array,
    transactions: Array,
    balance: Object,
  })

  const userId = ref(window.userId).value

  // Sort Transactions
  const sortedTransactions = ref([]);

  // Fungsi untuk melakukan sorting
  const sortTransactions = (sortedData) => {
      sortedTransactions.value = sortedData;
  };
</script>
