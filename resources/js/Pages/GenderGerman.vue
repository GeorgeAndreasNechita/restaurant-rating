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

    <div v-if="words[0] && words[0].german_word">
      <div class="text-green-700 text-4xl font-bold text-center mt-8">
        {{ words[0].german_word }} -
        <span class="text-blue-700 text-3xl font-bold text-center mt-2">
          {{ words[0].english_translation }}
        </span>
      </div>

      <div class="grid grid-flow-col justify-stretch mt-8 font-bold text-2xl">
        <button @click="selectAnswer('Der')" class="bg-blue-400 text-white px-4 py-2 rounded-lg mx-16">Der</button>
        <button @click="selectAnswer('Die')" class="bg-blue-500 text-white px-4 py-2 rounded-lg mx-16">Die</button>
        <button @click="selectAnswer('Das')" class="bg-blue-600 text-white px-4 py-2 rounded-lg mx-16">Das</button>
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
      isCorrect: ''
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
    selectAnswer(answer) {
      if (answer == this.words[0].article) {
        this.words[0].correct += 1;
        this.isCorrect = true;
      }
      else {
        this.words[0].correct -= 1
        this.isCorrect = false;
      }
      axios.post(`/api/german-words/${this.words[0].id}`, { correct: this.words[0].correct })
        .then(response => {
          console.log(response.data.message);
        })
        .catch(error => {
          console.error('Error updating correct status:', error);
        });
    }
  }
}
</script>

<style scoped></style>
