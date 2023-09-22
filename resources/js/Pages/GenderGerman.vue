<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import AddNewWord from '@/CustomComponents/AddNewWord.vue';
import axios from 'axios';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

      <!-- <add-new-word class="mt-8" ></add-new-word> -->
      <div class="mt-8 text-3xl font-bold text-center" :class="{ 'opacity-0': !lastWord.article }">
      Correct Answer: {{ lastWord.article }} {{ lastWord.german_word }}
      </div>

    <div v-if="words[0] && words[0].german_word" class="mt-3 pb-32"  :class="{ 'bg-green-400': answerIsCorrect === true , 'bg-red-400': answerIsCorrect === false, 'opacity-0': lastWord.article }" >
      <div class="text-center" >
        <span class="GERMAN-WORD text-4xl font-bold">{{ words[0].german_word }} | </span>
        <span class="GERMAND-WORD-PLURAL text-gray-600 text-4xl font-bold">{{ words[0].german_word_plural }} | </span>
        <span class="ENGLISH-TRANSLATION text-blue-700 text-3xl font-bold mt-2">
          {{ words[0].english_translation }}
        </span>
      </div>


      <!-- <div class="mt-4 text-green-700 text-2xl font-bold text-center">
        Right: {{ this.correctAnswers }}    
        <span class="text-red-700 text-2xl font-bold text-center">
           Wrong: {{ this.incorrectAnswers }}
        </span>
      </div> -->
      <div class="mt-4 text-green-700 text-2xl font-bold text-center" >Points: {{ this.correctAnswers - this.incorrectAnswers }} &nbsp;&nbsp;&nbsp; <span class="text-center text-black" >Words left: {{ wordsCountInDatabase }}</span></div>
      
      <div class="grid justify-center mt-2 font-bold text-2xl">
        <button @click="selectAnswer('die')" class="answerButton text-orange-500">Die</button>
        <button @click="selectAnswer('das')" class="answerButton text-violet-400">Das</button>
        <button @click="selectAnswer('der')" class="answerButton text-stone-400" >Der</button>
      </div>
<div>

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
    // wait for voices to load
    // I can't get FF to work without calling this first
    // Chrome works on the onvoiceschanged function
    this.voiceList = this.synth.getVoices()

    if (this.voiceList.length) {
      this.isLoading = false
    }

    this.synth.onvoiceschanged = () => {
      this.voiceList = this.synth.getVoices()
      // give a bit of delay to show loading screen
      // just for the sake of it, I suppose. Not the best reason
      setTimeout(() => {
        this.isLoading = false
      }, 800)
    }

    this.listenForSpeechEvents()
  },
  data() {
    return {
      words: [],
      lastWord: [],
      answerIsCorrect: '',
      correctAnswers: 0,
      incorrectAnswers: 0,
      isLoading: true,
      name: '',
      selectedVoice: 0,
      synth: window.speechSynthesis,
      voiceList: [],
      greetingSpeech: new window.SpeechSynthesisUtterance(),
      wordsCountInDatabase: ''
    }
  },
  
  methods: {
    fetchGermanWords() {
      axios.get('/api/german_words') // Replace with your API endpoint
        .then(response => {
          this.words = response.data[0];
          this.wordsCountInDatabase = response.data[1];
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
        this.words[0].correctAnswersCount += 1;
        this.answerIsCorrect = true;
        this.correctAnswers++;
        this.lastWord = [];
      }
// If answered with the wrong article
      else {
        this.words[0].correctAnswersCount -= 1
        this.answerIsCorrect = false;
        this.incorrectAnswers++;
        this.lastWord = this.words[0];
        setTimeout(() => {
          for (let i = 0; i < 1; i++) {
            this.sayWrongWord();
          }
          this.lastWord = []; 
        }, 1000);

      }
      axios.post(`/api/german-words/${this.words[0].id}`, { correctAnswersCount: this.words[0].correctAnswersCount })
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
    },
        /**
     * React to speech events
     */
    listenForSpeechEvents () {
      this.greetingSpeech.onstart = () => {
        this.isLoading = true
      }

      this.greetingSpeech.onend = () => {
        this.isLoading = false
      }
    },

    /**
     * Shout at the user
     */
    sayWrongWord () {
      this.greetingSpeech.text = this.lastWord.article + this.lastWord.german_word

      this.greetingSpeech.voice = this.voiceList[9]
      this.synth.speak(this.greetingSpeech)
      
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
