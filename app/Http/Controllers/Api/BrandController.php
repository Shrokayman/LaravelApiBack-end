<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try{
        //     $brand = auth()->userOrFail();
        // }catch(UserNotDefinedException $e){
        //     return response()->json(['error' => $e->getMessage()]);
        // }
            //Select* From Users
        $brand= Brand::all();
        return $brand;
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
            $brand = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if($request->user()->role =="admin"){
            $brand= new Brand;
            $brand->name=$request->name;
            $brand->save();
            return "Saved Succefully";
        }else {
            return "You Are Not Admin";
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
    public function destroy($id,Request $request)
    {
        try{
            $brand = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        if($request->user()->role =="admin"){
        $brand = Brand::destroy($id);
        return $brand;
        }else{
            return "You Are Not Admin";
        }
    }
    }

