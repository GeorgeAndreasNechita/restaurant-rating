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
                'picture_url' => 'https://www.in-muenchen.de/bilder/2020/02/12/13535584/933702157-asiatisch-restaurants-muenchen-3be9.jpg',
                'rating' => 4.2,
            ],
            [
                'name' => 'Steakhouse Grill',
                'city' => 'New York City',
                'address' => '789 Oak Ave',
                'description' => 'A steak lover\'s paradise, offering a wide selection of juicy steaks and grilled dishes.',
                'picture_url' => 'https://bdc2020.o0bc.com/wp-content/uploads/2022/05/Coquette-by-Josh-Jamison-627568873aa86-scaled.jpg',
                'rating' => 1.8,
            ],
            [
                'name' => 'Pasta Palace',
                'city' => 'Florence',
                'address' => '321 Pine St',
                'description' => 'Indulge in delectable Italian pasta dishes and enjoy the charming atmosphere.',
                'picture_url' => 'https://delawaretoday.com/wp-content/uploads/2022/01/dt_image001_2006124.jpg',
                'rating' => 2.0,
            ],
            [
                'name' => 'Burger Bistro',
                'city' => 'Los Angeles',
                'address' => '654 Maple Ave',
                'description' => 'Satisfy your burger cravings with our juicy and flavorful burger creations.',
                'picture_url' => 'https://bdc2020.o0bc.com/wp-content/uploads/2020/06/Bostonia-Public-House-768x432.jpg',
                'rating' => 4.7,
            ],

        ];

        foreach ($restaurants as $restaurantData) {
            Restaurant::create($restaurantData);
        }
    }
}
