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

      <div class="mt-8 text-3xl font-bold text-center" :class="{ 'opacity-0': !lastWord.article }">
      Correct Answer: {{ lastWord.article }} {{ lastWord.german_word }}
      </div>

    <div v-if="words[0] && words[0].german_word" class="mt-3 pb-32"  :class="{ 'bg-green-400': answerIsCorrect === true , 'bg-red-400': answerIsCorrect === false, 'opacity-0': lastWord.article }" >
      <div class="text-4xl font-bold text-center">
        {{ words[0].german_word }} -
        <span class="text-blue-700 text-3xl font-bold text-center mt-2">
          {{ words[0].english_translation }}
        </span>
      </div>


      <div class="mt-4 text-green-700 text-2xl font-bold text-center">
        Right: {{ this.correctAnswers }}    
        <span class="text-red-700 text-2xl font-bold text-center">
           Wrong: {{ this.incorrectAnswers }}
        </span>
      </div>

      <div class="grid justify-center mt-2 font-bold text-2xl">
        <button @click="selectAnswer('Die')" class="answerButton text-orange-500">Die</button>
        <button @click="selectAnswer('Das')" class="answerButton text-violet-400">Das</button>
        <button @click="selectAnswer('Der')" class="answerButton text-stone-400" >Der</button>
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
      lastWord: [],
      answerIsCorrect: '',
      correctAnswers: 0,
      incorrectAnswers: 0,
    }
  },
  
  methods: {
    fetchGermanWords() {
      axios.get('/api/german_words') // Replace with your API endpoint
        .then(response => {
          this.words = response.data;
        })
        .catch(error => {
          console.error('Error fetching German words:', error);
        });
    },
    selectAnswer(answer) {
      // If answered with the right article
      if (answer == this.words[0].article) {
        var mySound = new Audio('success.mp3')
        mySound.play()
        this.words[0].correct += 1;
        this.answerIsCorrect = true;
        this.correctAnswers++;
        this.lastWord = [];
      }
// If answered with the wrong article
      else {
        var mySound = new Audio('failure.mp3')
        mySound.play()
        this.words[0].correct -= 1
        this.answerIsCorrect = false;
        this.incorrectAnswers++;
        this.lastWord = this.words[0]
        setTimeout(() => {
        this.lastWord = []; 
        }, 2600);
      }
      axios.post(`/api/german-words/${this.words[0].id}`, { correct: this.words[0].correct })
        .then(response => {
        })
        .catch(error => {
        });

        setTimeout(() => {
          this.answerIsCorrect = '';
          this.words.shift();
          if(this.words.length == 0){
            this.fetchGermanWords();
          }
        }, 350);
    }
  }
}
</script>

<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer components {
  .answerButton {
    @apply bg-blue-500 text-white px-32 py-4 rounded-lg my-4 mx-16;
  }
}

</style>
