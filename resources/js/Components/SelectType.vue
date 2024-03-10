<template>
    <div class="mt-2 sm:flex sm:items-center">
        <div class="rounded-lg overflow-hidden flex bg-gray-100 shadow-md">
            <div
                @click="selectType('income')"
                :class="{ 'bg-green-500 text-white': selectedType === 'income', 'hover:bg-green-400 hover:text-white': selectedType !== 'income' }"
                class="type-option cursor-pointer px-4 py-2 transition-colors duration-300 w-1/2"
                id="incomeOption"
            >
                Income
            </div>
            <div
                @click="selectType('expense')"
                :class="{ 'bg-red-500 text-white': selectedType === 'expense', 'hover:bg-red-400 hover:text-white': selectedType !== 'expense' }"
                class="type-option cursor-pointer px-4 py-2 transition-colors duration-300 w-1/2"
                id="expenseOption"
            >
                Expense
            </div>
        </div>
    </div>
  </template>
  
  <script setup>
    import { defineEmits, ref, defineProps } from 'vue';
    const props = defineProps({
        selectedType: String // Menerima jenis transaksi yang dipilih dari parent component
    });
    const emits = defineEmits(['update:selectedType', 'type:change']);
    const selectType = (type) => {
        emits('type:change', type); // Mengirimkan jenis transaksi yang dipilih ke parent component
    };
  </script>