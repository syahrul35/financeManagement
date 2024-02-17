<template>
    <transition name="modal">
        <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4 py-6 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="closeModal"></div>
                
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 max-h-[60vh] overflow-y-auto">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Add Transaction
                            </h3>

                            <SelectType></SelectType>
                            <!-- Your input fields for adding transaction -->
                            <form @submit.prevent="submitForm">
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionCategory" class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start grid justify-items-start">Category</label>
                                    <select v-model="transactionCategory" id="transactionCategory" name="transactionCategory" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4">
                                        <option value="food">Food</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="housing">Housing</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionDate" class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start">Date</label>
                                    <input type="date" v-model="transactionDate" id="transactionDate" name="transactionDate" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4">
                                </div>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionDescription" class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start">Description</label>
                                    <textarea v-model="transactionDescription" id="transactionDescription" name="transactionDescription" rows="3" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4"></textarea>
                                </div>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionTotal" class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start">Total</label>
                                    <input type="number" v-model="transactionTotal" id="transactionTotal" name="transactionTotal" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4">
                                </div>
                            </form>
                        </div>  
                    </div>
                    <div class="bg-indigo-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row justify-end">
                        <form @submit.prevent="submitForm" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-500 text-base font-medium text-white hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm mr-2 min-w-20 mb-2">
                        Save
                        </form>

                        <button @click="closeModal" type="button" class="min-w-20 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm mb-2">
                        Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
    import { ref, defineProps, defineEmits } from 'vue';
    import SelectType from '../../Components/SelectType.vue';

    // Modal
    const props = defineProps(['showModal']);
    const emits = defineEmits(['closeModal']);

    const transactionName = ref('');
    const transactionDate = ref('');
    const transactionCategory = ref('');
    const transactionDescription = ref('');
    const transactionTotal = ref('');

    const submitForm = () => {
    // Logic to handle form submission
    // For example, you can emit an event to pass the data to the parent component
    };

    const closeModal = () => {
    emits('closeModal'); // Emit event to close the modal
    transactionName.value = ''; // Reset the input field
    transactionDate.value = ''; // Reset the input field
    transactionCategory.value = ''; // Reset the input field
    transactionDescription.value = ''; // Reset the input field
    transactionTotal.value = ''; // Reset the input field
    };
    // end Modal

    
</script>
