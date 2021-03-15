<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public static function update(Request $request)
    {
        // Log::channel('dev-debugging')->info('$request is', ['request' =>$request]);
        $rating = Rating::firstOrCreate([
            'user_id' => $request->user_id,
            'restaurant_id' => $request->restaurant_id,
            ]);
        // Log::channel('dev-debugging')->info('$rating is',['rating' => $rating]);
        $rating->comment = $request->comment;
        $rating->rating = $request->rating;
        $rating->save();
        return Redirect::route('home');
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

    public static function getSingleRating($restaurant_id)
    {
        return Rating::where('user_id',Auth::id())->where('restaurant_id',$restaurant_id)->get()[0];
    }
    public static function ratingsWithRestaurants()
    {
        return Rating::select('*','restaurants.id as restaurant_id')->join('restaurants', 'restaurants.id', '=', 'ratings.restaurant_id')
        ->where('ratings.user_id',Auth::id())
        ->get();
    }
    public static function updateSingleRating($restaurant_id,$value)
    {
        $rating = self::getSingleRating(Auth::id(),$restaurant_id)->rating;
        $rating = $value;
        $rating->save();
    }
}
