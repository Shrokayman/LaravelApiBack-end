<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder_ProductRequest;
use App\Http\Requests\UpdateOrder_ProductRequest;
use App\Models\Order_Product;

class OrderProductController extends Controller
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
     * @param  \App\Http\Requests\StoreOrder_ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_ProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Product $order_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Product $order_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_ProductRequest  $request
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_ProductRequest $request, Order_Product $order_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Product  $order_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Product $order_Product)
    {
        //
    }
}
