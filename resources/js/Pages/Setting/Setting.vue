<template>
  <div>
    <Head title="Setting"/>

    <AuthenticatedLayout>
      <template #header>
        Setting
      </template>

      <div class="bg-gray-50 shadow-lg rounded-xl min-w-full">
        <div class="m-2">
          <div class="flash-message-container mb-2">
            <flashmessage
              v-if="$page.props.flash.message"
              :message="$page.props.flash.message.message"
              :type="$page.props.flash.message.type"
            />
          </div>
          <Category :categories="categories" />
        </div>
      </div>
    </AuthenticatedLayout>
  </div>
</template>

<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { defineProps } from 'vue';

  import Category from '../../Partials/Category/Category.vue';
  import Flashmessage from '@/Components/Flashmessage.vue';

  const props = defineProps({
    categories: Array
  });
</script>