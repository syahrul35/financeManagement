<template>
    <div class="mx-auto w-11/12 overflow-hidden md:w-3/5 shadow-lg rounded-xl">
      <canvas id="myChart" class="w-full"></canvas>
    </div>
</template>

<script setup>
 // Impor Chart.js
  import { ref, onMounted } from 'vue';
  import Chart from 'chart.js/auto';

  // Fungsi untuk menggambar pie chart
  const drawPieChart = () => {
    const data = {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'Traffic',
        data: [2112, 2343, 2545, 3423, 2365, 1985, 987],
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

    const config = {
      type: 'pie',
      data: data,
    };

    // Membuat instansi pie chart
    const ctx = document.getElementById('myChart');
    new Chart(ctx, config);
  };

  // Ketika komponen dimuat, gambar pie chart
  onMounted(() => {
    drawPieChart();
  });
</script>
