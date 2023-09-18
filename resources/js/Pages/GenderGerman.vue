<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import axios from 'axios';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-" v-if="words[0]">
      <div class="text-green-700 text-4xl font-bold text-center mt-8">
        {{ words[current].german_word }}
      </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
  created() {
    this.fetchGermanWords();
  },
  data() {
    return {
      words: [],
      current: 0
    }
  },
  methods: {
    fetchGermanWords() {
      axios.get('/german_words') // Replace with your API endpoint
        .then(response => {
          this.words = response.data;
        })
        .catch(error => {
          console.error('Error fetching German words:', error);
        });
    },
  }
}
</script>

<style scoped>

</style>