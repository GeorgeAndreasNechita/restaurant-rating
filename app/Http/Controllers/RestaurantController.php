<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{


    // Create
    public function store(Request $request)
    {
        $restaurant = Restaurant::create($request->all());
        return response()->json(['message' => 'Restaurant created successfully', 'data' => $restaurant]);
    }
    // Read
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json($restaurants);
    }
    // Update
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());
        return response()->json($restaurant, 200);
    }
    // Delete
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return response()->json(['message' => 'Restaurant deleted successfully']);
    }
}
