<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import StarRating from 'vue-star-rating'
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            Restaurants in Stuttgart
        </div>
        <div>
            
            <ul class="list">
                <div class="max-w-sm rounded overflow-hidden shadow-lg" v-for="restaurant in restaurants"
                    :key="restaurant.id">
                    <img class="w-2/3 m-auto mt-8" :src="restaurant.picture_url" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-center">{{ restaurant.name }} - {{ restaurant.city }}</div>
                        <p class="text-gray-700 text-base">
                            {{ restaurant.description }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                    </div>
                    <div class="star-parent-div"><star-rating :rating="restaurant.rating" :read-only="true" /></div>
                    <button @click="deleteRestaurant(restaurant.id)"
                        class="bg-red-500 hover:bg-orange-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mb-8 mx-16">
                        Delete from database
                    </button>
                </div>
            </ul>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    components: {
        StarRating
    },
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
        deleteRestaurant(restaurantId) {
            axios.delete(`/api/restaurants/${restaurantId}`)
                .then(response => {
                    alert(response.data.message); // Handle the success response
                })
                .catch(error => {
                    console.error(error); // Handle the error response
                });
            this.fetchRestaurants();
        }
    },
};
</script>

<style scoped>
.list {
    display: grid;
    grid-gap: 30px;
    grid-template-columns: 1fr 1fr 1fr;
    margin: 0 30px;
}

.star-parent-div {
    display: grid;
    justify-content: center;
    margin-bottom: 30px;
}
</style>