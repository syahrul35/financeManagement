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
            <th scope="col" class="w-1/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Category
            </th>
            <th scope="col" class="w-4/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Description
            </th>
            <th scope="col" class="w-3/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Total</th>
            <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Action</th>
          </tr>
        </thead>
        <tbody class="bg-indigo-100 divide-y divide-gray-200">
          <tr v-for="transaction in transactions" :key="transaction.id" class="text-center text-sm">
            <td class="w-2/12 px-6 py-4">{{ transaction.date }}</td>
            <td class="w-1/12 px-6 py-4">{{ getCategoryNameById(transaction.idCategory) }}</td>
            <td class="w-4/12 px-6 py-4">{{ transaction.desc }}</td>
            <td class="w-3/12 px-6 py-4">{{ formattedTotal(transaction.total) }}</td>
            <td class="w-2/12">
              <div class="flex justify-center">
                  <button @click="openModal(transaction)" class="flex flex-row items-center bg-yellow-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                  </button>
                  <button @click="deleteTransaction(transaction)" type="button" class="flex flex-row items-center bg-red-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                  </button>
                </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <teleport to="body">
        <EditModal v-if="showModal" @closeModal="closeModal" :categories="categories" :selectedTransaction="selectedTransaction" :userId="userId"/>
    </teleport>
  </div>
</template>

<script setup>
  import { ref, defineProps } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import EditModal from '../../Pages/Transactions/EditTransactionModal.vue';

  // State variables
  const currentPage = ref(3);
  const totalPages = ref(5);
  const paginatedData = ref([]);
  const showModal = ref(false);
  const selectedTransaction = ref(null)
  const form = useForm({});

  // Props
  const props = defineProps({
    transactions: Array,
    userId: Number,
    categories: Array,
  });

  // Functions
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
    // paginatedData.value = data.slice(startIndex, startIndex + 5);
  }

  const getCategoryNameById = (categoryId) => {
    const category = props.categories.find(cat => cat.id === categoryId)
    return category.categoryName
  };

  const formattedTotal = (total) => {
    const roundedTotal = Math.round(total);
    return roundedTotal.toLocaleString('id-ID');
  };

  // Methods
  const openModal = (transaction) => {
    selectedTransaction.value = transaction;
    showModal.value = true;
  };
  
  const closeModal = () => {
    showModal.value = false;
  };

  async function deleteTransaction(transaction) {
    if (confirm('Are You Sure to Delete This Transaction?')) {
      try {
        await form.delete(route('transactions.destroy', { transaction: transaction.id }));
      } catch (error) {
        console.log(error)
      }
    }
  }
</script>