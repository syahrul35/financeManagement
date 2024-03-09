<template>
  <Head title="Transactions"/>

  <AuthenticatedLayout>
    <template #header>
      Transactions
    </template>

    <div id="table" class="bg-gray-50 shadow-lg rounded-xl min-w-full">
      <div class="m-2">
        <div class="flash-message-container mb-2">
          <flashmessage
            v-if="$page.props.flash.message"
            :message="$page.props.flash.message.message"
            :type="$page.props.flash.message.type"
          />
        </div>
        <ButtonActionTransaction :categories="categories" :userId="userId"></ButtonActionTransaction>
        <TableTransactions :transactions="transactions" :categories="categories" :userId="userId"></TableTransactions>
      </div>
    </div>
    
  </AuthenticatedLayout>
</template>

<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head, useForm } from '@inertiajs/vue3';
  import { ref, onMounted, defineProps } from 'vue';

  import TableTransactions from '../../Partials/TransactionsTable/TableTransactions.vue';
  import ButtonActionTransaction from './ButtonActionTransaction.vue';
  import Flashmessage from '@/Components/Flashmessage.vue';

  const props = defineProps({
    categories: Array,
    transactions: Array,
  })

  const userId = ref(window.userId.toString())
</script>
