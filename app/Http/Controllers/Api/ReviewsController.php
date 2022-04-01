<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReviewsRequest;
use App\Http\Requests\UpdateReviewsRequest;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return $reviews;
        // $rates = Review::withCount('rate')->get();
        // $rates = Review::avg('rate');
        // return $rates;
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
     * @param  \App\Http\Requests\StoreReviewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = Review::where('product_id', '=', $request->product_id)->where('user_id', '=', $request->user_id)->first();
        if ($review === null) {
             // Rate doesn't exist
            $review= new Review();
            $review->product_id=$request->product_id;
            $review->user_id=$request->user_id;
            $review->rate=$request->rate;
            // $request->product_id->average_rate =Review::avg('rate'); 
            $review->save();
        return "Rate saved";
    }else{
        return "rate didnt save";
    }
//         $review= new Review();
//         $review->product_id=$request->product_id;
//         $review->user_id=$request->user_id;
//         $review->rate=$request->rate;
//         $review->save();
//         if ($review) {
//         return "Rate saved";
//     }else{
//     return "rate didnt save";
//  }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $review = Review::where('product_id','=',$id)->get();
        // return $review;
    }
    public function showRates($id)
    {
        if($avgRates = Review::where('product_id','=',$id)->avg('rate')){

            return $avgRates;
        }else{
            return "Product Have Not Rated yet !!";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewsRequest  $request
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
