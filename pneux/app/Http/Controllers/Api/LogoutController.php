<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LogoutController extends Controller
{
    public function action(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'User successfully logged out',
        ],200);
    }
}