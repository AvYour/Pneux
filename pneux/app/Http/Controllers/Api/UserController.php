<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function action(Request $request){
        return response()->json([
            'message'=>'User Successfully Fetched',
            'data'=>$request->user()
        ],200);
    }
}