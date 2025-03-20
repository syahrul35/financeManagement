<template>
  <div class="mx-auto w-11/12 overflow-hidden md:w-3/5 bg-white shadow-lg rounded-xl">
    <canvas ref="incomeChartCanvas" class="w-full"></canvas>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Chart from 'chart.js/auto';

const incomeChartCanvas = ref(null);
const chartInstance = ref(null);

// Ambil data langsung dari Inertia
const { expenseChartData } = usePage().props;

// Gambar pie chart
const drawPieChart = () => {
  if (!expenseChartData || expenseChartData.labels.length === 0) {
    console.warn("Tidak ada data income!");
    return;
  }

  const data = {
    labels: expenseChartData.labels,
    datasets: [{
      label: 'Income',
      data: expenseChartData.data,
      backgroundColor: [
        'rgba(63, 81, 181, 0.5)',
        'rgba(77, 182, 172, 0.5)',
        'rgba(66, 133, 244, 0.5)',
        'rgba(156, 39, 176, 0.5)',
        'rgba(233, 30, 99, 0.5)',
        'rgba(66, 73, 244, 0.4)',
        'rgba(66, 133, 244, 0.2)',
      ],
    }]
  };

  if (chartInstance.value) {
    chartInstance.value.destroy(); // Hancurkan chart sebelumnya jika ada
  }

  const ctx = incomeChartCanvas.value.getContext('2d');
  chartInstance.value = new Chart(ctx, {
    type: 'pie',
    data: data,
  });
};

// Render saat halaman dimuat
onMounted(() => {
  drawPieChart();
});
</script>
