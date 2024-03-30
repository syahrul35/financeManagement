<template>
    <div class="flex flex-row mb-2 pr-2">
        <div class="basis-11/12 flex flex-row">
            <button class="flex flex-row items-center mr-6 text-sm font-medium text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                </svg>
                <span class="ml-1">Sort</span>
            </button>
            <button class="flex flex-row items-center mr-6 text-sm font-medium text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
                <span class="ml-1">Filter</span>
            </button>
        </div>
        <div class="basis-1/12">
            <button @click="openModal"
                class="flex flex-row items-center bg-emerald-500 text-white font-medium text-sm px-2 p-1 rounded-md focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="ml-1">Add</span>
            </button>
        </div>
        <teleport to="body">
            <AddTransaction v-if="showModal" @closeModal="closeModal" :categories="categories" :userId="userId"/>
        </teleport>
    </div>
</template>

<script setup>
import AddTransaction from "../../Partials/TransactionsTable/AddTransactionModal.vue";
import { ref, defineProps } from "vue";

const props = defineProps({
    categories: Array,
    userId: Number,
})

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

</script>
