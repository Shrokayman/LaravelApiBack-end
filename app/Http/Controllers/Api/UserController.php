<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserController extends Controller
{
    public function register(Request $request){

        $user = User::where('email' , $request['email'])->first();
        if($user){
            $response['status'] = 0;
            $response['message'] = 'Email already exists';
            $response['code'] = 409;
        }
        else{
            $user = User::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' =>bcrypt($request->password),
                'city' => $request->city,
                'street' => $request->street,
                'phone' => $request->phone,
                'role' => 'user',
            ]);
            $response['status'] = 1;
            $response['message'] = 'User registered successfully';
            $response['code'] = 200;
        }
        return response()->json($response);
    }


    public function login(Request $request){
        $credentials = $request->only('email' , 'password');
        try{
            if(!JWTAuth::attempt($credentials)){
                $response['status'] = 0;
                $response['code'] = 401;
                $response['message'] = 'Email or password is incorrect';
                $response['data'] = null;
                return response()->json($response);
            }
        }catch(JWTException $e){
            $response['data'] = null;
            $response['code'] = 500;
            $response['message'] = 'Could not create token';
            return response()->json($response);
        }

        $user = auth()->user();
        $data['token'] = auth()->claims([
            'user_id' => $user->id,
            'user_name' => $user->fname,
            'email' => $user->email,
            'user_role' => $user->role
        ])->attempt($credentials);

        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['message'] = 'Login in successfully';
        return response()->json($response);
    }


    public function update(Request $request,$id){
        try{
            $user = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        $user = User::find($id);
        if($user){
            $user->update($request->all());
            if($request->password){
                $user->password = bcrypt($request->password);
                $user->save();
            }

            $response['status'] = 1;
            $response['message'] = 'Data updated successfully';
            $response['code'] = 200;
        }
        else{
            $response['status'] = 0;
            $response['message'] = 'User not found';
            $response['code'] = 404;
        }

        return response()->json($response);
    }

    public function show($id){
        try{
            $user = auth()->userOrFail();
        }catch(UserNotDefinedException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message' => "User does not exist"] , 404);
        }
        return response()->json($user);
    }

    public function refresh(){
        try{
            $newToken = auth()->refresh();
        }catch(TokenInvalidException $e){
            return response()->json(['error' => $e->getMessage()] ,401);
        }

        return response()->json(['token' => $newToken]);
    }

}
