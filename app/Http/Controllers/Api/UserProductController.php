<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProductRequest;
use App\Http\Requests\UpdateUserProductRequest;
use App\Models\UserProduct;

class UserProductController extends Controller
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
     * @param  \App\Http\Requests\StoreUserProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return \Illuminate\Http\Response
     */
    public function show(UserProduct $userProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProduct $userProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserProductRequest  $request
     * @param  \App\Models\UserProduct  $userProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProductRequest $request, UserProduct $userProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProduct  $userProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProduct $userProduct)
    {
        //
    }
}
