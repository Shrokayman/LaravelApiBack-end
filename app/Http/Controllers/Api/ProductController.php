<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
    
// use App\Http\Requests\StoreProductRequest;
// use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Product::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product;
        $product->name=$request->name;
        $product->image=$request->image;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->average_rate=$request->average_rate;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->save();
        return response()->json($product, 201);
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
        $product =  Product::find($id);
        $categoryName = $product->category()->get()->first()->name;
        $brandName = $product->brand()->get()->first()->name;
        return array('product' => $product, 'categoryName' => $categoryName, 'brandName' => $brandName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        if(is_null($product)){
            return response()->json(['message' =>'Product Not Found', 404]);
        }
        return response()->json($product::find($id), 200);
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

        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' =>'Product Not Found' , 404]);
        }

        $product->name=$request->name;
        $product->image=$request->image;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->average_rate=$request->average_rate;
        $categoryName = $product->category()->get()->first()->name;
        $brandName = $product->brand()->get()->first()->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        return response()->json(array('product' => $product, 'categoryName' => $categoryName, 'brandName' => $brandName), 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product Not Found', 404]);
        }
        Product::destroy($id);
        return response()->json(['message'=>'Product Deleted', 204]);
    }
}
