<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],422);
        }
        $user=User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $token =$user->createToken('auth-token')->plainTextToken;
            return response()->json([
                'message'=>'Login Successfull',
                'token'=>$token,
                'data'=>$user,
            ],200);
            }else{
            return response()->json([
                'message'=>'Incorrect credentials',
                'errors'=>$validator->errors()
            ],400);
            }
            return response()->json([
                'message'=>'Validations fails',
                'errors'=>$validator->errors()
            ],400);
        }
    }
}