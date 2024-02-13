<template>
  <Head title="Report"/>

  <AuthenticatedLayout>
    <template #header>
      Report
    </template>

    <div id="table" class="bg-gray-50 shadow-lg rounded-xl min-w-full">
      <div class="m-2">
        <h1 class="text-lg font-semibold mb-2 text-gray-700">Transactions on {{ currentMonth }}</h1>
        <button-action-report></button-action-report>
        <table-transactions></table-transactions>
      </div>
    </div>

    <div id="chart-expense" class="bg-gray-50 shadow-lg rounded-xl mt-4 min-w-full">
      <div class="m-2">
        <h1 class="text-lg font-semibold mb-2 text-gray-700 m-2">Frequent Expense on {{ currentMonth }}</h1>
        <ExpenseChart></ExpenseChart>
      </div>  
    </div>

    <div id="chart-income" class="bg-gray-50 shadow-lg rounded-xl mt-4 min-w-full">
      <div class="m-2">
        <h1 class="text-lg font-semibold mb-2 text-gray-700 m-2">Frequent Income on {{ currentMonth }}</h1>
        <IncomeChart></IncomeChart>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import ButtonActionReport from './ButtonActionReport.vue';
import TableTransactions from '../../Components/TableTransactions.vue';

import ExpenseChart from './ExpenseChart.vue';
import IncomeChart from './IncomeChart.vue';

import dayjs from 'dayjs';
const currentMonth = dayjs().format('MMMM');
</script>