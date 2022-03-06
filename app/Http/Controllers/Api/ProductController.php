<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;

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
        $product = Product::all();
        // $categoryName = $product->category()->get()->first()->name;
        // $brandName = $product->brand()->get()->first()->name;
        return $product;
        // return json(array('product' => $product, 'categoryName' => $categoryName, 'brandName' => $brandName),);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  try{
        //      $user = auth()->userOrFail();
        //  }catch(UserNotDefinedException $e){
        //      return response()->json(['error' => $e->getMessage()]);
        //  }
        //  if($request->user()->role =="admin"){
        //      $product = new Product;
        //      $category= $request->category;
        //      $product->name=$request->name;
        //      $product->description=$request->description;
        //      $product->price=$request->price;
        //      $product->discount=$request->discount;
        //      $product->image=$request->image;
        //      $product->category_id=$request->category_id;
        //      $product->brand_id=$request->brand_id;
        //      $product->save();
        //      return "Product Saved";

        //  }else{
        //      return " You Are Not Admin";
        //  }
        $product = new Product;

        if($request->hasFile('image')){
            $compliteFileName = $request->file('image')->getClientOriginalName();
            $filaNameOnly = pathinfo($compliteFileName , PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ' , '_' , $filaNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('image')->storeAs('public/products' , $comPic);
            $product->image=$comPic;
        }
        $category= $request->category;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->average_rate= 0;
        $product->save();
        if($product->save()){
            return response()->json($product, 201);
        }else {
            return ['status' => false, 'message' => 'Couldnt Save Image'];
        }

    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
     public function show(Request $request, $id)
    {
        //
        $product =  Product::find($id);

        // $categoryName  =$product->category()->get()->find($product['category_id'])->name;
        // $brandName = $product->brand()->get()->find($product['brand_id'])->name;
        // $brandId = $product[0]['brand_id'];
        // $brandName = $product[1]['brand'];

        $productBrand = Brand::where('id', $product[0]->brand_id)->get();
        $productCategory = Category::where('id', $product[0]->brand_id)->get();

        //  return rarray($product, $brandName));
        //  return response()->json(array('product' => $product, 'categoryName' => $categoryName, 'brandName' => $brandName));
        return response()->json(array(['product' => $product, 'brand' => $productBrand, 'category' => $productCategory]),200);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
      */
    // public function edit($id)
    // {
    //     $product= Product::find($id);
    //     if(is_null($product)){
    //         return response()->json(['message' =>'Product Not Found', 404]);
    //     }
    //     return response()->array($product::find($id));
    //     // $categoryName = $product->category()->get()->first()->name;
    //     //  $brandName = $product->brand()->get()->first()->name;
    //     //  return array('product' => $product, 'categoryName' => $categoryName, 'brandName' => $brandName);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {

    //     $product = Product::find($id);
    //     if(is_null($product)){
    //         return response()->json(['message' =>'Product Not Found' , 404]);
    //     }

    //     $product->name=$request->name;
    //     $product->image=$request->image;
    //     $product->description=$request->description;
    //     $product->price=$request->price;
    //     $product->discount=$request->discount;
    //     // $product->average_rate=$request->average_rate;
    //     $categoryName = $product->category()->get()->first()->name;
    //     $brandName = $product->brand()->get()->first()->name;
    //     // $product->category_id = $request->category_id;
    //     // $product->brand_id = $request->brand_id;
    //     $product->save();
    //     return response()->json(array('product' => $product, 'categoryName' => $categoryName, 'brandName' => $brandName), 200);

    // }
    public function update(Request $request,$id){
        try{
            $user = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if($user->role =="admin"){
            $product = Product::find($id);
            if($product){
                $product->update($request->all());
                $response['status'] = 1;
                $response['message'] = 'Product updated successfully';
                $response['code'] = 200;
            }
            else{
                $response['status'] = 0;
                $response['message'] = 'Product not found';
                $response['code'] = 404;
            }
        }
        else{
            return "You Are Not Admin";
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if($user->role =="admin"){

        $product = Product::destroy($id);
        return $product;
        }
        else{
            return "You Are Not Admin";
        }
    }
    public function search($name)
    {
    return Product::where('name', 'like', '%'.$name.'%')->get();
    }

    public function rating()
    {
    $products= Product::orderBy('average_rate','desc')->take(3)->get();
    return $products;
    }

}
