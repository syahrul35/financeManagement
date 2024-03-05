<template>
  <transition name="modal">
    <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 py-6 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="closeModal"></div>        
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 max-h-[60vh] overflow-y-auto">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 capitalize" id="modal-title">
                            Add Category - {{ props.currentType }}
                        </h3>
                        <!-- Your input fields for adding category -->
                        <form @submit.prevent="submitForm" class="mt-4">
                            <div class="sm:flex sm:items-center justify-between">
                                <label for="categoryName" class="block text-sm font-medium text-gray-700 sm:w-2/6">Category Name</label>
                                <input type="text" id="categoryName" name="categoryName" v-model="form.categoryName" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:w-4/6 sm:text-sm border-gray-300 rounded-md">
                                <input type="hidden" id="type" name="type" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block sm:w-4/6 sm:text-sm border-gray-300 rounded-md" v-model="props.currentType">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bg-indigo-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row justify-end">
                    <button @click="submitForm" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-500 text-base font-medium text-white hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm mr-2 min-w-20 mt-2">
                        Save
                    </button>

                    <button @click="closeModal" type="button" class="min-w-20 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm mt-2">
                    Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
  </transition>
</template>
  
<script setup>
  import { defineProps, defineEmits } from 'vue';
  import { useForm } from '@inertiajs/vue3';

  const props = defineProps({
    currentType: String
  });

  const emits = defineEmits(['closeModal']);

  const form = useForm({
    categoryName: '',
    type: props.currentType
  });

  const submitForm = async () => {
    try {
      const response = await form.post(route('category.store'), {
        categoryName: form.categoryName,
        type: form.type
      });
      closeModal();

    } catch (error) {
      emitAlert('Failed to add category', 'error');
    }
  };

  const closeModal = () => {
    emits('closeModal');
  };
</script>
