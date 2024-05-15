<template>
    <div class="bg-gray-50 shadow-lg rounded-xl min-w-72 max-w-72 mb-2 text-sm">
        <div class="bg-indigo-400 min-h-6 p-2 rounded-t-lg">
            <span class="text-white font-bold">Balance</span>
        </div>
        <div class="m-2 flex justify">
            <span class="w-28">ATM Balance</span>
            <span class="w-4">:</span>
            <span>{{ formattedTotal(balance.atm_balance) }}</span>
        </div>
        <div class="m-2 flex justify">
            <span class="w-28">Physical Money</span>
            <span class="w-4">:</span>
            <span>{{ formattedTotal(balance.physical_money) }}</span>
        </div>
        <hr class="w-10/12 mx-auto bg-indigo-400">
        <div class="m-2 flex justify">
            <span class="w-28">Total Balance</span>
            <span class="w-4">:</span>
            <span>{{ formattedTotal(balance.total_balance) }}</span>
        </div>
    </div>
</template>

<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        balance: Object
    })

    const formattedTotal = (total) => {
        const roundedTotal = Math.round(total);
        return roundedTotal.toLocaleString('id-ID');
    };
</script>