<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        if ($request->user()->role == 'admin'){
            return Order::all();
            
        }

        return Order::where("user_id", $request->user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Order::create([
            'user_id' => auth()->user(),
            'status' => 'pending',
            'shipping_address' => $request->shipping_address,
            'total_cost' => $request->total_cost,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        if (!Order::find($id) || !Order::where("user_id", $request->user()->id)->get()->find($id, $request->user()->role == 'admin')){
            $response['status'] = 0;
            $response['message'] = 'Order Not Found';
            $response['code'] = 404;
            return response($response);
        }

        if ($request->user()->role == 'admin'){

            return Order::find($id);

        }

        return Order::where("user_id", $request->user()->id)->get()->find($id);
        
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

        $order = Order::find($id);

        if(!$order){
            return "No Order Found";
        }

        if (!$request->anyFilled($request->all()) == null){
            return 'Please Enter A valid Value';
        }

        if($order )
        $order->update([
            'status' => $request->status,
        ]);
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Order::destroy($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($status)
    {
        return Order::where('status', 'like', '%'.$status.'%')->get();
    }
}
