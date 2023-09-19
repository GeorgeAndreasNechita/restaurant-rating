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



    <div v-if="words[0] && words[0].german_word" class="py-32"  :class="{ 'bg-green-400': answerIsCorrect === true , 'bg-red-400': answerIsCorrect === false }" >
      <div class="text-4xl font-bold text-center">
        {{ words[0].german_word }} -
        <span class="text-blue-700 text-3xl font-bold text-center mt-2">
          {{ words[0].english_translation }}
        </span>
      </div>
      <div class="mt-4 text-green-700 text-2xl font-bold text-center">
        Right: {{ this.correctAnswers }} 
      </div>
        <div class="text-red-700 text-2xl font-bold text-center">
           Wrong: {{ this.incorrectAnswers }}
        </div>

      <div class="grid justify-center mt-2 font-bold text-2xl">
        <button @click="selectAnswer('Die')" class="my-2 bg-blue-500 text-white px-32 py-4 rounded-lg mx-16">Die</button>
        <button @click="selectAnswer('Das')" class="my-2 bg-blue-600 text-white px-32 py-4 rounded-lg mx-16">Das</button>
        <button @click="selectAnswer('Der')" class="my-2 bg-blue-400 text-white px-32 py-4 rounded-lg mx-16" >Der</button>
      </div>
    </div>
  </AppLayout>
</template>

<script>
export default {
  created() {
    this.fetchGermanWords();
    
  },
  mounted(){

  },
  data() {
    return {
      words: [],
      answerIsCorrect: '',
      correctAnswers: 0,
      incorrectAnswers: 0,
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
        var mySound = new Audio('success.mp3')
        mySound.play()
        this.words[0].correct += 1;
        this.answerIsCorrect = true;
        this.correctAnswers++;

      }
      else {
        var mySound = new Audio('failure.mp3')
        mySound.play()
        this.words[0].correct -= 1
        this.answerIsCorrect = false;
        this.incorrectAnswers++;
      }
      axios.post(`/api/german-words/${this.words[0].id}`, { correct: this.words[0].correct })
        .then(response => {
          console.log(response.data.message);
        })
        .catch(error => {
          console.error('Error updating correct status:', error);
        });

        setTimeout(() => {
          this.answerIsCorrect = '';
          this.words.shift();
        }, 500);
    }
  }
}
</script>

<style scoped></style>
