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
        <div v-if="showAddMenu"
            class="grid grid-cols-2 gap-4 mx-6 my-6 bg-gray-200 border border-gray-300 rounded-lg p-4 shadow-md inline-block">
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
                    <div class="grid grid-cols-2 gap-4 mx-8">
                        <button @click="editRestaurant(restaurant)"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mb-8">
                            Edit
                        </button>
                        <button @click="deleteRestaurant(restaurant.id)"
                            class="bg-red-500 hover:bg-orange-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mb-8">
                            Delete
                        </button>
                    </div>
                </div>
            </ul>
        </div>
        <div class="modal-div">
            <!-- overlay -->
            <div class="modal-div__overlay" v-if="showEditingModal" @click="showEditingModal = false"></div>

            <!-- modal -->
            <div class="modal-div__modal" v-if="showEditingModal">
                <button class="modal-div__close text-gray-500 hover:text-gray-800"
                    @click="showEditingModal = false">x</button>
                <h3 class="text-lg font-semibold mb-4">Edit Restaurant</h3>
                <div class="mb-4">
                    <label for="editName" class="block text-gray-700 font-medium mb-1">Name:</label>
                    <input type="text" id="editName" v-model="editingRestaurantData.name"
                        class="w-full border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="editCity" class="block text-gray-700 font-medium mb-1">City:</label>
                    <input type="text" id="editCity" v-model="editingRestaurantData.city"
                        class="w-full border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="editAddress" class="block text-gray-700 font-medium mb-1">Address:</label>
                    <input type="text" id="editAddress" v-model="editingRestaurantData.address"
                        class="w-full border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="editDescription" class="block text-gray-700 font-medium mb-1">Description:</label>
                    <textarea id="editDescription" v-model="editingRestaurantData.description"
                        class="w-full border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="mb-4">
                    <label for="editPictureUrl" class="block text-gray-700 font-medium mb-1">Picture URL:</label>
                    <input type="text" id="editPictureUrl" v-model="editingRestaurantData.picture_url"
                        class="w-full border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="editRating" class="block text-gray-700 font-medium mb-1">Rating:</label>
                    <input type="number" id="editRating" v-model="editingRestaurantData.rating"
                        class="w-full border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button @click="cancelUpdateRestaurant" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Cancel</button>
                <button @click="updateRestaurant" class="ml-8 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>


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
            rating: null,

            editingRestaurantData: {},

            showEditingModal: false
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
        editRestaurant(restaurant) {
            this.showEditingModal = true;
            this.editingRestaurantData = {
                name: restaurant.name,
                city: restaurant.city,
                address: restaurant.address,
                description: restaurant.description,
                picture_url: restaurant.picture_url,
                rating: restaurant.rating,
            }
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
        },
        cancelUpdateRestaurant(){
            this.editingRestaurantData = {};
            this.showEditingModal = false;
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

/* Modal */
.modal-div {
    display: grid;
    justify-items: center;
}

.modal-div__modal {
    position: fixed;
    top: 10%;
    width: 80%;
    z-index: 9999;
    margin: 0 auto;
    padding: 20px 30px;
    background-color: #fff;
}

.modal-div__overlay {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
}

.modal-div__close {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>