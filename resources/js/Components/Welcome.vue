<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import StarRating from 'vue-star-rating'
</script>

<template>
    <div>
        <h1 class="p-6 lg:p-8 bg-white border-b border-gray-200">
            Restaurants around the world
        </h1>
        <div class="text-center mt-8">
            <button @click="toggleAddMenu"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Add your own restaurant <span v-if="showAddMenu"> - Hide</span><span v-if="!showAddMenu"> - Show</span>
            </button>
        </div>
        <div v-if="showAddMenu" class="grid grid-cols-2 gap-4 mx-6 my-6 bg-gray-200 border border-gray-300 rounded-lg p-4 shadow-md inline-block">
            <input type="text" v-model="name" placeholder="Name"
                class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="text" v-model="city" placeholder="City"
                class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="text" v-model="address" placeholder="Address"
                class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <textarea v-model="description" placeholder="Description"
                class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 col-span-2"></textarea>
            <input type="text" v-model="picture_url" placeholder="Picture URL"
                class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="number" v-model="rating" placeholder="Rating"
                class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" @click="createRestaurant()"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded col-span-2">Create
                Restaurant</button>
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
            showAddMenu: false,
            name: '',
            city: '',
            address: '',
            description: '',
            picture_url: '',
            rating: null
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
        },
        toggleAddMenu() {
            this.showAddMenu = !this.showAddMenu
        },
        createRestaurant() {
            const restaurantData = {
                name: this.name,
                city: this.city,
                address: this.address,
                description: this.description,
                picture_url: this.picture_url,
                rating: this.rating
            };

            axios.post('/api/addRestaurant', restaurantData)
                .then(response => {
                    console.log(response.data); // Handle the success response
                    this.fetchRestaurants();
                    this.name, this.city, this.address, this.description, this.picture_url, this.rating = '',
                        this.showAddMenu = false;
                })
                .catch(error => {
                    console.error(error); // Handle the error response
                });
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
}</style>