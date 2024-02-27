<template>
  <div class="button-table flex">
    <button @click="prevPage" :disabled="currentPage === 1"
      class="flex items-center justify-center bg-indigo-200 rounded-md m-2 px-2">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
      </svg>
      <span class="text-sm text-gray-700">Prev</span>
    </button>
    <button @click="nextPage" :disabled="currentPage === totalPages"
      class="flex items-center justify-center bg-indigo-200 rounded-md m-2 px-2">
      <span class="text-sm text-gray-700">Next</span>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
      </svg>
    </button>
  </div>
  <div class="max-h-[80vh] overflow-y-auto">
    <div class="overflow-x-auto rounded-lg shadow-xl">
      <table class="table-auto min-w-full divide-y divide-gray-200">
        <thead class="bg-indigo-400 text-white">
          <tr>
            <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Date</th>
            <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Category
            </th>
            <th scope="col" class="w-5/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Description
            </th>
            <th scope="col" class="w-3/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Total</th>
          </tr>
        </thead>
        <tbody class="bg-indigo-100 divide-y divide-gray-200">
          <tr v-for="(row, index) in paginatedData" :key="index">
            <td v-for="(cell, cellIndex) in row" :key="cellIndex" class="px-6 py-4 whitespace-wrap">{{ cell }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
  import { ref, defineProps } from 'vue';

  const currentPage = ref(3);
  const totalPages = ref(5);

  const data = [
    ['John Doe', 'john@example.com', '123-456-7890', '123-456-7890'],
    ['Jane Smith', 'jane@example.com', '987-654-3210', '987-654-3210'],
    ['John Doe', 'john@example.com', '123-456-7890', '123-456-7890'],
    ['John Doe', 'john@example.com', '123-456-7890', '123-456-7890'],
    ['John Doe', 'john@example.com', '123-456-7890', '123-456-7890'],
    ['John Doe', 'john@example.com', '123-456-7890', '123-456-7890'],
    // Add additional data rows as needed
  ];

  const props = defineProps({
    categories: String
  })

  const paginatedData = ref([]);

  function nextPage() {
    if (currentPage.value < totalPages.value) {
      currentPage.value++;
    }
  }

  function prevPage() {
    if (currentPage.value > 1) {
      currentPage.value--;
    }
  }

  function updatePagination() {
    const startIndex = (currentPage.value - 1) * 5;
    paginatedData.value = data.slice(startIndex, startIndex + 5);
  }

  updatePagination();
</script>