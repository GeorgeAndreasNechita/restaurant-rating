<template>
  <div>
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <inertia-link
        v-if="$page.props.user"
        href="/dashboard"
        class="text-sm text-gray-700 underline"
      >
        Dashboard
      </inertia-link>

      <template v-else>
        <inertia-link
          :href="route('login')"
          class="text-sm text-gray-700 underline"
        >
          Log in
        </inertia-link>

        <inertia-link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-sm text-gray-700 underline"
        >
          Register
        </inertia-link>
      </template>
    </div>

    <div class="container restaurants-container" v-if="$page.props.user">
      <h1 class="text-center mb-4">Restaurants in Stuttgart</h1>
      <h2>Add new:</h2>
      <form @submit.prevent="addNewRestaurant" class="grid grid-cols-1">
        <label for="newRestaurantName">Name:</label>
        <input id="newRestaurantName" v-model="newRestaurant.name" />
        <label for="newRestaurantDescription">Description:</label>
        <textarea
          id="newRestaurantDescription"
          v-model="newRestaurant.description"
        ></textarea>
        <label for="newRestaurantImageLink">Image Link:</label>
        <input id="newRestaurantImageLink" v-model="newRestaurant.image_link" />
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-3 mb-5 w-1/3"
        >
          Add
        </button>
      </form>
      <!-- card -->
      <div v-for="restaurant in restaurants" :key="restaurant.id" class="row">
        <div
          class="card restaurants-container__card grid flex justify-center w-4/5 mt-5"
        >
          <img
            class="mt-3 card-img-top restaurants-container__image"
            :src="restaurant.image_link"
            alt="Card image cap"
          />
          <div class="card-body">
            <h1 class="card-title text-center">{{ restaurant.name }}</h1>
            <p class="card-text">
              {{ restaurant.description }}
            </p>
          </div>
          <!-- comment -->
          <form
            @submit.prevent="
              updateRestaurantRating({
                restaurant_id: restaurant.id,
                id: restaurant.ratingId,
                comment: restaurant.comment,
                rating: restaurant.rating,
                user_id: $page.props.user.id,
              })
            "
            class="user-rating mt-4 w-full px-5"
          >
            <h2 class="text-center">User Input:</h2>
            <label for="comment" class="">Comment</label>
            <div class="grid grid-cols-6 gap-4">
              <textarea
                id="comment"
                v-model="restaurant.comment"
                class="w-full col-span-5"
              >
              </textarea>
              <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
              >
                Save
              </button>
            </div>
            <div
              class="grid grid-cols-6 gap-4 mt-5 items-center content-center"
            >
              <h2 class="text-center">Rating:</h2>
              <h4
                class="cursor-pointer text-center"
                :class="{
                  'user-rating__selected-rating-number':
                    restaurant.rating == '1',
                }"
                @click="
                  restaurant.rating = 1;
                  updateRestaurantRating({
                    restaurant_id: restaurant.id,
                    id: restaurant.ratingId,
                    comment: restaurant.comment,
                    rating: 1,
                    user_id: $page.props.user.id,
                  });
                "
              >
                1
              </h4>
              <h4
                class="cursor-pointer text-center"
                :class="{
                  'user-rating__selected-rating-number':
                    restaurant.rating == '2',
                }"
                @click="
                  restaurant.rating = 2;
                  updateRestaurantRating({
                    restaurant_id: restaurant.id,
                    id: restaurant.ratingId,
                    comment: restaurant.comment,
                    rating: 2,
                    user_id: $page.props.user.id,
                  });
                "
              >
                2
              </h4>
              <h4
                class="cursor-pointer text-center"
                :class="{
                  'user-rating__selected-rating-number':
                    restaurant.rating == '3',
                }"
                @click="
                  restaurant.rating = 3;
                  updateRestaurantRating({
                    restaurant_id: restaurant.id,
                    id: restaurant.ratingId,
                    comment: restaurant.comment,
                    rating: 3,
                    user_id: $page.props.user.id,
                  });
                "
              >
                3
              </h4>
              <h4
                class="cursor-pointer text-center"
                :class="{
                  'user-rating__selected-rating-number':
                    restaurant.rating == '4',
                }"
                @click="
                  restaurant.rating = 4;
                  updateRestaurantRating({
                    restaurant_id: restaurant.id,
                    id: restaurant.ratingId,
                    comment: restaurant.comment,
                    rating: 4,
                    user_id: $page.props.user.id,
                  });
                "
              >
                4
              </h4>
              <h4
                class="cursor-pointer text-center"
                :class="{
                  'user-rating__selected-rating-number':
                    restaurant.rating == '5',
                }"
                @click="
                  restaurant.rating = 5;
                  updateRestaurantRating({
                    restaurant_id: restaurant.id,
                    id: restaurant.ratingId,
                    comment: restaurant.comment,
                    rating: 5,
                    user_id: $page.props.user.id,
                  });
                "
              >
                5
              </h4>
            </div>
          </form>
          <!-- {{ restaurants }}
          {{ ratings }}} -->
        </div>
      </div>
    </div>
    <div style="margin-top: 250px"></div>
  </div>
</template>

<style scoped>
.bg-gray-100 {
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
  border-color: #edf2f7;
  border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
  color: #cbd5e0;
  color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
  color: #a0aec0;
  color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
  color: #718096;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
  color: #4a5568;
  color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
  color: #1a202c;
  color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-gray-800 {
    background-color: #2d3748;
    background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
  }

  .dark\:bg-gray-900 {
    background-color: #1a202c;
    background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
  }

  .dark\:border-gray-700 {
    border-color: #4a5568;
    border-color: rgba(74, 85, 104, var(--tw-border-opacity));
  }

  .dark\:text-white {
    color: #fff;
    color: rgba(255, 255, 255, var(--tw-text-opacity));
  }

  .dark\:text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
  }
}

.user-rating__selected-rating-number {
  font-size: 55px;
  font-weight: 900;
  color: blue;
}
.restaurants-container__card {
  display: grid;
}

.restaurants-container {
  margin-top: 10vh;
}
.restaurants-container__image {
  justify-self: center;
  width: 250px;
}
</style>

<script>
import StarRating from "vue-star-rating";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    restaurants: Object,
    ratings: Object,
  },
  data() {
    return {
      newRestaurant: {
        name: "",
        description: "",
        image_link: "",
      },
    };
  },
  methods: {
    updateRestaurantRating(data) {
      this.$inertia.post("/api/updateRating", data, {
        replace: true,
        preserveState: true,
        preserveScroll: true,
      });
    },
    addNewRestaurant() {
      this.$inertia
        .post("/api/addRestaurant", this.newRestaurant, {
          replace: true,
          preserveState: true,
          preserveScroll: true,
        })
        .then(() => {
          this.newRestaurant = { name: "", description: "", image_link: "" };
        });
    },
    removeRestaurant() {
      this.$inertia
        .post("/api/addRestaurant", this.newRestaurant, {
          replace: true,
          preserveState: true,
          preserveScroll: true,
        })
        .then((data) => {
          this.newRestaurant = { name: "", description: "", image_link: "" };
        });
    },
  },
  mounted() {
    console.log(this.restaurants);
  },
  components: {
    "star-rating": StarRating,
  },
};
</script>
