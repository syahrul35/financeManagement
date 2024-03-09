<template>
  <div v-if="isVisible" :class="['p-4', 'rounded', 'shadow-md', 'flex', 'flex-row', 'justify-between', 'gap-4', bgColorClass]">
    <div>{{ message }}</div>
    <button @click="hideMessage" class="text-white">&times;</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
  message: String,
  type: String
});

const isVisible = ref(false);

const hideMessage = () => {
  isVisible.value = false;
}

onMounted(() => {
  isVisible.value = true;
  if (props.type === 'success') {
    setTimeout(() => {
      hideMessage();
    }, 10000); // hide after 10 seconds
  }
});

const bgColorClass = (() => {
  switch (props.type) {
    case 'error':
      return 'bg-red-500 text-white';
    case 'success':
      return 'bg-green-500 text-white';
  }
})();
</script>
