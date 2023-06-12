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
                'city' => 'Berlin',
                'address' => '123 Main St',
                'description' => 'A trendy Mexican restaurant offering a variety of delicious dishes and cocktails.',
                'picture_url' => 'https://img0.oastatic.com/img2/12984351/max/sausalitos.jpg',
                'rating' => 4.5,
            ],
            [
                'name' => 'Italiano Ristorante',
                'city' => 'Rome',
                'address' => '456 Elm St',
                'description' => 'An authentic Italian restaurant serving traditional pasta, pizza, and more.',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 4.2,
            ],
            [
                'name' => 'Steakhouse Grill',
                'city' => 'New York City',
                'address' => '789 Oak Ave',
                'description' => 'A steak lover\'s paradise, offering a wide selection of juicy steaks and grilled dishes.',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 1.8,
            ],
            [
                'name' => 'Pasta Palace',
                'city' => 'Florence',
                'address' => '321 Pine St',
                'description' => 'Indulge in delectable Italian pasta dishes and enjoy the charming atmosphere.',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 2.0,
            ],
            [
                'name' => 'Burger Bistro',
                'city' => 'Los Angeles',
                'address' => '654 Maple Ave',
                'description' => 'Satisfy your burger cravings with our juicy and flavorful burger creations.',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 4.7,
            ],
            [
                'name' => 'Sushi Spot',
                'city' => 'Tokyo',
                'address' => '987 Oak St',
                'description' => 'Discover the art of sushi-making with our fresh and exquisite sushi offerings.',
                'picture_url' => 'https://media-cdn.tripadvisor.com/media/photo-s/0e/a0/2c/51/italiano-restaurant-copenhagen.jpg',
                'rating' => 0.4,
            ],
        ];

        foreach ($restaurants as $restaurantData) {
            Restaurant::create($restaurantData);
        }
    }
}
