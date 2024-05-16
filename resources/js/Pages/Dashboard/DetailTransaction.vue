<template>
    <div v-if="isVisible" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center"
        style="z-index: 25;" @click.self="close">
        <div class="bg-white p-4 rounded-lg shadow-xl max-w-md w-full" @click.stop>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Transaction Details - {{ props.selectedDate }}</h2>
                <button @click="close" class="text-red-600">&times;</button>
            </div>
            <div class="mt-4">
                <h3 class="text-lg font-bold">Income</h3>
                <ul>
                    <li v-for="transaction in incomeTransactions" :key="transaction.id">
                        <p>{{ getCategoryName(transaction.idCategory) }} - {{ transaction.desc }} - Rp. {{ transaction.total }}</p>
                    </li>
                </ul>
                <h3 class="text-lg font-bold mt-4">Expense</h3>
                <ul>
                    <li v-for="transaction in expenseTransactions" :key="transaction.id">
                        <p>{{ getCategoryName(transaction.idCategory) }} - {{ transaction.desc }} - Rp. {{ transaction.total }}</p>
                    </li>
                </ul>
                <div class="border-t mt-4 pt-4">
                    <p><strong>Total Income:</strong> Rp. {{ totalIncomeOnSelectedDate }}</p>
                    <p><strong>Total Expense:</strong> Rp. {{ totalExpenseOnSelectedDate }}</p>
                    <p><strong>Net:</strong> Rp. {{ netTotalOnSelectedDate }}</p>
                </div>
            </div>
            <button @click="close" class="mt-4 bg-emerald-500 p-2 rounded-lg text-white">Close</button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, defineProps } from 'vue'

const props = defineProps({
    isVisible: Boolean,
    selectedDate: String, // Objek tanggal yang dipilih
    categories: Array, // Array dari kategori
    transactions: Array // Array dari transaksi
})

const emit = defineEmits(['close'])

const close = () => {
    emit('close')
}

const getCategoryName = (categoryId) => {
    // Fungsi untuk mendapatkan nama kategori berdasarkan id kategori
    const category = props.categories.find(cat => cat.id === categoryId)
    return category ? category.categoryName : 'Unknown Category'
}

// Mengelompokkan transaksi berdasarkan tipe (income atau expense)
const groupedTransactions = computed(() => {
    const grouped = {
        income: [],
        expense: []
    }

    props.transactions.forEach(transaction => {
        const category = props.categories.find(cat => cat.id === transaction.idCategory)
        if (category) {
            if (category.type === 'income') {
                grouped.income.push(transaction)
            } else if (category.type === 'expense') {
                grouped.expense.push(transaction)
            }
        }
    })

    return grouped
})

// Menghitung total pendapatan pada tanggal yang dipilih
const totalIncomeOnSelectedDate = computed(() => {
    return incomeTransactions.value.reduce((acc, transaction) => acc + parseFloat(transaction.total), 0)
})

// Menghitung total pengeluaran pada tanggal yang dipilih
const totalExpenseOnSelectedDate = computed(() => {
    return expenseTransactions.value.reduce((acc, transaction) => acc + parseFloat(transaction.total), 0)
})

// Menghitung total bersih pada tanggal yang dipilih
const netTotalOnSelectedDate = computed(() => {
    return totalIncomeOnSelectedDate.value - totalExpenseOnSelectedDate.value
})

// Mendapatkan transaksi pendapatan berdasarkan tanggal yang dipilih
const incomeTransactions = computed(() => {
    return groupedTransactions.value.income.filter(transaction => transaction.date === props.selectedDate)
})

// Mendapatkan transaksi pengeluaran berdasarkan tanggal yang dipilih
const expenseTransactions = computed(() => {
    return groupedTransactions.value.expense.filter(transaction => transaction.date === props.selectedDate)
})
</script>
