<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'name' => 'Sausalitos',
                'city' => 'City 1',
                'address' => '123 Main St',
                'description' => 'State 1',
                'picture_url' => 'https://img0.oastatic.com/img2/12984351/max/sausalitos.jpg',
                'rating' => 4.5,
            ],
            [
                'name' => 'Italiano Ristorante',
                'city' => 'City 2',
                'address' => '456 Elm St',
                'description' => 'State 2',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 4.2,
            ],
            [
                'name' => 'Steakhouse Grill',
                'city' => 'City 3',
                'address' => '789 Oak Ave',
                'description' => 'State 3',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 1.8,
            ],
            [
                'name' => 'Pasta Palace',
                'city' => 'City 4',
                'address' => '321 Pine St',
                'description' => 'State 4',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 2.0,
            ],
            [
                'name' => 'Burger Bistro',
                'city' => 'City 5',
                'address' => '654 Maple Ave',
                'description' => 'State 5',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 4.7,
            ],
            [
                'name' => 'Sushi Spot',
                'city' => 'City 6',
                'address' => '987 Oak St',
                'description' => 'State 6',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 4.4,
            ],
            [
                'name' => 'Mexican Grill',
                'city' => 'City 7',
                'address' => '543 Cedar Ave',
                'description' => 'State 7',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 4.3,
            ],
            [
                'name' => 'Thai Cuisine',
                'city' => 'City 8',
                'address' => '876 Elm St',
                'description' => 'State 8',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 3.6,
            ],
            [
                'name' => 'Pizza Paradise',
                'city' => 'City 9',
                'address' => '210 Oak Ave',
                'description' => 'State 9',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 2.1,
            ],
        ];

        foreach ($restaurants as $restaurantData) {
            Restaurant::create($restaurantData);
        }
    }
}
