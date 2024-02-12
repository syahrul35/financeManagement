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
                    :class="[d.isToday() ? 'bg-emerald-100' : '']"
                    class="border border-slate-200 flex flex-col h-32" 
                    v-for="d in units" 
                    :key="d"                
                >
                    <div :class="[d.isToday() ? 'bg-emerald-400 text-white' : 'bg-gray-100']" class="text-center">
                        <span>{{ d.format('D') }}</span>
                    </div>
                    <div class="m-auto text-xs text-gray-700 p-2">
                        <span>
                            Rp. 500.000
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref, computed } from 'vue';
    import dayjs from 'dayjs';
    import isToday from 'dayjs/plugin/isToday';
    dayjs.extend(isToday);

    const viewDate = ref(dayjs());

    const daystoPrepend = computed(() => {
        const startOfMonth = viewDate.value.startOf("month");
        const startOfFirstWeek = startOfMonth.startOf("week");
        const daysToFirstDay = startOfMonth.diff(startOfFirstWeek, "day");
        return Array.from(new Array(daysToFirstDay).keys());
    });

    const units = computed(() => {
        let ranges = [];
        let startOfRange = viewDate.value.startOf('month').add(-1,'day');
        let endOfRange = viewDate.value.endOf('month').add(-1,'day');

        let currentDate = startOfRange;

        while (currentDate.isBefore(endOfRange) || currentDate.isSame(endOfRange)) {
            currentDate = currentDate.add(1, 'day');
            ranges.push(currentDate);
        }
        return ranges;
    });

    const shiftMonth = function (amount) {
        viewDate.value = viewDate.value.add(amount, 'month');
    };
    const reset = function () {
        viewDate.value = dayjs();
    };

    const weekDays = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];
</script>

<style scoped>
@media (max-width: 950px) {
  .container {
    padding: 0.5rem;
  }
  .calendar {
    min-width: 650px;
  }
  .tag {
    max-width: 650px;
  }
  .overflow-x-auto {
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
  }
  .grid-cols-7 {
    grid-template-columns: repeat(7, minmax(0, 1fr));
  }
  .grid-cols-7 {
    width: 100%;
    /* max-width: calc(100% / 1.4); */
    margin: 0;
  }
}
</style>