<template>
    <div class="bg-gray-50 shadow-lg rounded-xl w-4/12 mb-2 text-sm">
        <div class="m-2">
            <span>Saldo ATM: </span>
            <span>{{ balance.atm_balance }}</span>
        </div>
        <div class="m-2">
            <span>Uang Fisik: </span>
            <span>{{ balance.physical_money }}</span>
        </div>
        <div class="m-2">
            <span>Total Saldo: </span>
            <span>{{ balance.total_balance }}</span>
        </div>
    </div>
</template>

<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        balance: Object
    })
</script>