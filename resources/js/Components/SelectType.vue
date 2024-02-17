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
  // Import defineEmits from Vue
  import { defineEmits, ref } from 'vue';
  
  // Define selectedType as a ref
  const selectedType = ref('income');
  
  // Function to select the type and emit the event
  const selectType = (type) => {
    selectedType.value = type;
    // Emitting an event to send the selectedType to the parent component (Category.vue)
    emits('update:selectedType', selectedType.value);
    // Emitting an event to notify the parent component (Category.vue) of the type change
    emits('type:change', selectedType.value);
  };
  
  // Define emitted events
  const emits = defineEmits(['update:selectedType', 'type:change']);
</script>
