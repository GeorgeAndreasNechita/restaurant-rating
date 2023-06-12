<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            Restaurants in Stuttgart
        </div>
        <div class="actions">
            <ul>
                <div class="max-w-sm rounded overflow-hidden shadow-lg" v-for="restaurant in restaurants"
                    :key="restaurant.id">
                    <img class="w-full"
                        src="https://sausalitos-bucket.s3.eu-central-1.amazonaws.com/Standorte_Saarbruecken_Slider_Web_740x800_0fedb53fa3.jpg"
                        alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ restaurant.name }} - {{ restaurant.city }}</div>
                        <p class="text-gray-700 text-base">
                            {{restaurant.description}}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">

                    </div>
                </div>
            </ul>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            restaurants: [],
        };
    },
    mounted() {
        this.fetchRestaurants();
    },
    methods: {
        fetchRestaurants() {
            axios
                .get('/api/restaurants')
                .then(response => {
                    this.restaurants = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
};
</script>

<style scoped>
.actions {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
}
</style>