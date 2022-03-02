<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    // try{
    //     $category = auth()->userOrFail();
    // }catch(UserNotDefinedException $e){
    //     return response()->json(['error' => $e->getMessage()]);
    // }
        //Select* From Users

    $category= Category::all();
    return $category;
       
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
        try{
            $category = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if($request->user()->role =="admin"){

        $category= new Category;
        $category->name=$request->name;
        $category->save();
        return  "category saved";
    }else{
        return " You Are Not Admin";
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function destroy($id,Request $request)
    {
        try{
            $category = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if($request->user()->role =="admin"){
            
        $category = Category::destroy($id);
        return $category;
        }else{
            return " You Are Not Admin";
        }
    }
}
