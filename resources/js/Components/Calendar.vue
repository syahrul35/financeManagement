<template>
    <div class="container bg-white p-2 rounded-lg shadow-xl mb-4 max-h-[80vh] overflow-y-auto">
        <div class="min-w-[900px] overflow-x-auto calendar">
            <div class="flex items-center justify-between mb-4 tag">
                <button class="bg-emerald-500 p-2 rounded-lg text-white shadow-lg text-sm" @click="reset">Today</button>
                <div class="flex items-center space-x-4">
                <button class="btn" @click="shiftMonth(-1)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <span class="text-lg">{{ viewDate.format('MMMM YYYY') }}</span>
                <button class="btn" @click="shiftMonth(1)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                </div>
            </div>
            <div class="grid grid-cols-7 gap-1 mb-2">
                <div v-for="d in weekDays" :key="d" class="text-center">
                    <div>{{ d }}</div>
                </div>
            </div>
            <div class="grid grid-cols-7">
                <div v-for="p in daystoPrepend" :key="p"></div>
                <div 
                    :class="[d.isToday() ? 'bg-purple-100' : '']"
                    class="border border-slate-200 flex flex-col h-32" 
                    v-for="d in units" 
                    :key="d"
                    @click="openModal(d)"
                >
                    <div :class="[d.isToday() ? 'bg-purple-600 text-white' : 'bg-gray-100']" class="text-center">
                        <span>{{ d.format('D') }}</span>
                    </div>
                    <div class="m-auto text-xs text-gray-700 p-2" :style="{ color: getTotalTransaction(d).textColor }">
                        <strong>
                            <span v-if="getTotalTransaction(d).total != null">Rp. </span>
                            {{ getTotalTransaction(d).total }}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
        <teleport to="body">
            <TransactionModal
                :isVisible="isModalVisible"
                :selectedDate="selectedDate"
                :categories="categories"
                :transactions="transactions"
                @close="isModalVisible = false"
            />
        </teleport>
    </div>
</template>

<script setup>
    import { ref, computed, defineProps } from 'vue'
    import dayjs from 'dayjs'
    import isToday from 'dayjs/plugin/isToday'
    import TransactionModal from '../Pages/Dashboard/DetailTransaction.vue';

    const props = defineProps({
        transactions: Array,
        categories: Array
    })

    const isModalVisible = ref(false)
    const selectedDate = ref(null)

    const viewDate = ref(dayjs())
    const weekDays = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ]

    dayjs.extend(isToday)

    const daystoPrepend = computed(() => {
        const startOfMonth = viewDate.value.startOf("month")
        const startOfFirstWeek = startOfMonth.startOf("week")
        const daysToFirstDay = startOfMonth.diff(startOfFirstWeek, "day")
        return Array.from(new Array(daysToFirstDay).keys())
    })

    const units = computed(() => {
        let ranges = []
        let startOfRange = viewDate.value.startOf('month').add(-1,'day')
        let endOfRange = viewDate.value.endOf('month').add(-1,'day')

        let currentDate = startOfRange

        while (currentDate.isBefore(endOfRange) || currentDate.isSame(endOfRange)) {
            currentDate = currentDate.add(1, 'day')
            ranges.push(currentDate)
        }
        return ranges
    })

    const shiftMonth = function (amount) {
        viewDate.value = viewDate.value.add(amount, 'month')
    }
    const reset = function () {
        viewDate.value = dayjs()
    }

    const getTotalTransaction = (date) => {
        const dateString = date.format('YYYY-MM-DD')
        const today = dayjs().startOf('day')

        if (date.isAfter(today, 'day')) {
            return {
                total: null,
                textColor: ''
            }
        }

        let totalIncome = 0
        let totalExpense = 0

        props.transactions.forEach(transaction => {
            if (transaction.date === dateString) {
                if (transaction.idCategory === 1) {
                    totalIncome += parseFloat(transaction.total)
                } else {
                    totalExpense += parseFloat(transaction.total)
                }
            }
        })

        const netIncome = totalIncome - totalExpense
        const total = Math.abs(netIncome)

        const textColor = netIncome >= 0 ? 'green' : 'red'

        return {
            total: total.toLocaleString('id-ID'),
            textColor: textColor
        }
    }

    const openModal = (date) => {
        selectedDate.value = date.format('YYYY-MM-DD')
        isModalVisible.value = true
    }
</script>