<template>
  <div class="m-2">
    <h1 class="text-lg font-semibold mb-2 text-gray-700">Category</h1>

    <SelectType :selectedType="selectedType" @type:change="handleTypeChange" />

    <ButtonActionCategory :currentType="currentType"></ButtonActionCategory>

    <div class="max-h-[60vh] overflow-y-auto mt-2">
      <div class="overflow-x-auto rounded-lg shadow-xl">
        <table class="table-auto min-w-full divide-y divide-gray-200">
          <thead class="bg-indigo-400 text-white">
            <tr>
              <th scope="col" class="w-4/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Category
                Name</th>
              <th scope="col" class="w-4/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">
                Description</th>
              <th scope="col" class="w-4/12 px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-indigo-100 divide-y divide-white text-center">
            <tr v-for="category in filteredCategories" :key="category.id">
              <td class="w-4/12 px-6 py-4 whitespace-wrap capitalize">{{ category.categoryName }}</td>
              <td class="w-4/12 px-6 py-4 whitespace-wrap capitalize">{{ category.type }}</td>
              <td class="w-4/12 px-6 py-4">
                <div class="flex justify-center">
                  <button @click="openModal(category)"
                    class="flex flex-row items-center bg-yellow-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                  </button>
                  <button @click="deleteCategory(category)" type="button"
                    class="flex flex-row items-center bg-red-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <teleport to="body">
      <EditModal v-if="showModal" @closeModal="closeModal" :selectedCategory="selectedCategory" />
    </teleport>
  </div>
</template>
  
<script setup>
  import { defineProps, ref, computed } from 'vue';
  import { useForm } from '@inertiajs/vue3'

  import ButtonActionCategory from './ButtonActionCategory.vue'
  import SelectType from '../../Components/SelectType.vue'
  import EditModal from './EditCategoryModal.vue'

  const props = defineProps({
    categories: Array,
    selectedType: String,
    currentType: String
  });

  const showModal = ref(false)
  const selectedCategory = ref(null)
  const form = useForm({})

  const selectedType = ref('income')

  const filteredCategories = computed(() => {
      return props.categories.filter(category => category.type === selectedType.value);
  });

  const handleTypeChange = (type) => {
    selectedType.value = type;
  };

  const openModal = (category) => {
    selectedCategory.value = category
    showModal.value = true
  };
  
  const closeModal = () => {
    showModal.value = false
  };

  const deleteCategory = async (category) => {
    if (confirm('Are You Sure to Delete This Category?')) {
      try {
        await form.delete(route('category.destroy', { category: category.id }))
      } catch (error) {
        console.log(error)
      }
    }
  };
</script>