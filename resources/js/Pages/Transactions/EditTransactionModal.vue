<template>
    <transition name="modal">
        <div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4 py-6 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="closeModal"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 max-h-[60vh] overflow-y-auto">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Edit Transaction
                            </h3>

                            <!-- Mengirimkan jenis transaksi yang dipilih ke SelectType -->
                            <SelectType :selectedType="selectedType" @type:change="selectedType = $event" />

                            <!-- Form tambahan -->
                            <form @submit.prevent="submitForm">
                                <!-- Input kategori yang disaring berdasarkan jenis transaksi yang dipilih -->
                                <input type="text" v-model="form.idUser" hidden>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionCategory"
                                        class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start grid justify-items-start">Category</label>
                                    <select id="transactionCategory" name="transactionCategory"
                                        v-model="form.idCategory"
                                        class="mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4">
                                        <option value="">Select a category</option>
                                        <option v-for="category in filteredCategories" :value="category.id"
                                            :key="category.id">
                                            {{ category.categoryName }}</option>
                                    </select>
                                </div>
                                <!-- Tambahkan bagian ini untuk form tambahan -->
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionDate"
                                        class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start">Date</label>
                                    <input type="date" id="transactionDate" name="transactionDate" v-model="form.date"
                                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4">
                                </div>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionDescription"
                                        class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start">Description</label>
                                    <textarea id="transactionDescription" name="transactionDescription" rows="3"
                                        v-model="form.desc"
                                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4"></textarea>
                                </div>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <label for="transactionTotal"
                                        class="block text-sm font-medium text-gray-700 sm:w-1/4 grid justify-start">Total</label>
                                    <input type="text" id="transactionTotal" name="transactionTotal"
                                        v-model="formattedTotal" @input="formattedTotal = $event.target.value"
                                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm sm:w-3/4">
                                </div>
                                <div class="mt-4 sm:flex sm:items-center">
                                    <span class="block text-sm font-medium text-gray-700 justify-start ">Is This Transaction Used ATM?</span>
                                    <input type="checkbox" id="transactionIsATM" name="transactionIsATM"
                                        v-model="form.isATM" :checked="form.isATM" class="mx-2 rounded-sm">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-indigo-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row justify-end">
                        <button @click="submitForm" type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-500 text-base font-medium text-white hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm mr-2 min-w-20 mb-2">
                            Save
                        </button>
                        <button @click="closeModal" type="button"
                            class="min-w-20 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:w-auto sm:text-sm mb-2">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
    import { ref, defineProps, defineEmits, computed, onMounted } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import SelectType from '../../Components/SelectType.vue';

    const props = defineProps({
        categories: Array,
        userId: String,
        selectedTransaction: Object,
    });

    // Modal
    const emits = defineEmits(['closeModal']);

    const selectedType = ref('income');

    const closeModal = () => {
        emits('closeModal');
    };
    // end Modal

    // Computed
    const formattedTotal = computed({
        get: () => {
            // Menggunakan regex untuk menambahkan titik sebagai pemisah ribuan saat menampilkan nilai
            return form.total.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        },
        set: (newValue) => {
            // Menghapus titik dari nilai yang dimasukkan ke dalam form saat disimpan
            form.total = newValue.replace(/\D/g, '');
        }
    })

    // Filter categories based on selectedType
    const filteredCategories = computed(() => {
        return props.categories.filter(category => category.type === selectedType.value)
    })

    // Form Edit
    const editedTransaction = ref({
        id: props.selectedTransaction.id,
        idUser: props.selectedTransaction.idUser,
        idCategory: props.selectedTransaction.idCategory,
        date: props.selectedTransaction.date,
        total: props.selectedTransaction.total,
        desc: props.selectedTransaction.desc,
        isATM: props.selectedTransaction.isATM,
    })

    const form = useForm({
        idUser: editedTransaction.value.idUser,
        idCategory: editedTransaction.value.idCategory,
        date: editedTransaction.value.date,
        total: editedTransaction.value.total,
        desc: editedTransaction.value.desc,
        isATM: editedTransaction.value.isATM,
    })
    // End Form Edit

    // Mounted
    onMounted(() => {
        form.idCategory = props.selectedTransaction.idCategory
        form.date = props.selectedTransaction.date
        form.total = props.selectedTransaction.total
        form.desc = props.selectedTransaction.desc
        form.isATM = !!props.selectedTransaction.isATM
    })

    const submitForm = async () => {
        try {
            await form.put(route('transactions.update', { transaction: editedTransaction.value.id }), {
                idUser: editedTransaction.value.idUser,
                idCategory: editedTransaction.value.idCategory,
                date: editedTransaction.value.date,
                total: editedTransaction.value.total.replace(/\D/g, ''),
                desc: editedTransaction.value.desc,
                isATM: editedTransaction.value.isATM
            })
            closeModal()

        } catch (error) {
            console.log(error)
        }
    }
</script>