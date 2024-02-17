<template>
  <div class="m-2">
    <h1 class="text-lg font-semibold mb-2 text-gray-700">Category</h1>
  </div>
    <div class="flex justify-between">
        <div class="button-table flex">
            <button @click="prevPage" :disabled="currentPage === 1" class="flex items-center justify-center bg-indigo-200 rounded-md m-2 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                <span class="text-sm text-gray-700">Prev</span>
            </button>
            <button @click="nextPage" :disabled="currentPage === totalPages" class="flex items-center justify-center bg-indigo-200 rounded-md m-2 px-2">
                <span class="text-sm text-gray-700">Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
        <div class="inset-y-0 right-0">
            <button @click="openModal" class="flex flex-row items-center bg-emerald-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="ml-1">Add</span>
            </button>
        </div>
        <teleport to="body">
            <AddCategoryModal v-if="showModal" @closeModal="closeModal" />
        </teleport>
    </div>
    <div class="max-h-[80vh] overflow-y-auto mt-2">
      <div class="overflow-x-auto rounded-lg shadow-xl">
        <table class="table-auto min-w-full divide-y divide-gray-200">
          <thead class="bg-indigo-400 text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Category Name</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Description</th>
            </tr>
          </thead>
          <tbody class="bg-indigo-100 divide-y divide-white text-center">
            <tr>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">Jane Smith</td>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">jane@example.com</td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            </tr>
            <tr>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
              <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            </tr>
            <!-- Add additional rows as needed -->
          </tbody>
        </table>
      </div>
    </div>
</template>
  
<script setup>
  import { ref } from 'vue';
  import AddCategoryModal from './AddCategoryModal.vue';
  
  const currentPage = ref(3);
  const totalPages = ref(5);
  const showModal = ref(false);
  
  const nextPage = () => {
    if (currentPage.value < totalPages.value) {
      currentPage.value++;
    }
  };
  
  const prevPage = () => {
    if (currentPage.value > 1) {
      currentPage.value--;
    }
  };
  
  const openModal = () => {
    showModal.value = true;
  };
  
  const closeModal = () => {
    showModal.value = false;
  };

  const closeModalOutside = (event) => {
    // Tutup modal jika yang diklik adalah latar belakang modal itu sendiri
    if (event.target === event.currentTarget) {
        closeModal();
    }
    };
</script>
