<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $result = Restaurant::select('*', 'restaurants.id as id', 'ratings.id as rating_id')->rightJoin('ratings', 'restaurants.id', '=', 'ratings.restaurant_id')
            ->where('ratings.user_id', Auth::id())
            ->get();

        // Log::channel('dev-debugging')->info('$rating is',['rating' => $result->isEmpty()]);
        if ($result->isEmpty()) {
            return Restaurant::all();
        } else {
            return $result;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::channel('dev-debugging')->info('$rating is', ['rating' => $request]);
        // $restaurant = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image_link' => 'required',
        // ]);

        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->image_link = $request->image_link;
        $restaurant->save();
        
        foreach (User::all() as $key => $value) {
            // Log::channel('dev-debugging')->info('', ['key' => $key,'value'=>$value]);
                $rating = new Rating;
                $rating->user_id = $value->id;
                $rating->restaurant_id = $restaurant->id;
                $rating->rating = 3;
                $rating->comment = '';
                $rating->save();

        }
        return Redirect::route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
