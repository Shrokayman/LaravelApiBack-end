<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;

use function PHPUnit\Framework\at;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cart::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = Cart::create([
            'user_id' => $request->user()->id
        ]);
        $cart->save();

        foreach ($request->products as $product) {
            $selectedProduct = Product::where('id', $product['id'])->first();
            if ($selectedProduct) {
                $count = $product['quantity'];

                $cart->products()->attach($selectedProduct->id, ['product_quantity' => $count]);
            }
        }

        $cart->save();

        return Cart::where('id', $cart->id)->with('products')->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $cart = Cart::with('products')->where('user_id', $request->user()->id)->find($id);

        return $cart;
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
        Cart::with('products')->where('user_id', $request->user()->id)->find($id);

        $cart = [];

        // return dd($request->products[1]['id']);
        foreach($request->products as $product){

            Cart::find($id)->products()->syncWithPivotValues(['product_id' => $product['id']], ['product_quantity' => $product['quantity']]);

        }

        $cart =  Cart::find($id)->products()->syncWithPivotValues(['product_id' => $product['id']], ['product_quantity' => $product['quantity']]);

        return dd($cart);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Cart::destroy($id);
    }
}
