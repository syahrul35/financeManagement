<template>
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
  <div class="max-h-[80vh] overflow-y-auto">
    <div class="overflow-x-auto rounded-lg shadow-xl">
      <table class="table-auto min-w-full divide-y divide-gray-200">
        <thead class="bg-indigo-400 text-white">
          <tr>
            <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Date</th>
            <th scope="col" class="w-2/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Category</th>
            <th scope="col" class="w-5/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Description</th>
            <th scope="col" class="w-3/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Total</th>
          </tr>
        </thead>
        <tbody class="bg-indigo-100 divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">Jane Smith</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">jane@example.com</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">987-654-3210</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">987-654-3210</td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">John Doe</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">john@example.com</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
            <td class="px-6 py-4 whitespace-wrap" colspan="1">123-456-7890</td>
          </tr>
          <!-- Add additional rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        currentPage: 3,
        totalPages: 5, // Ganti dengan jumlah total halaman
      };
    },
    methods: {
      nextPage() {
        if (this.currentPage < this.totalPages) {
          this.currentPage++;
        }
      },
      prevPage() {
        if (this.currentPage > 1) {
          this.currentPage--;
        }
      },
    },
  };
</script>