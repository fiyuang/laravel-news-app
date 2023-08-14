<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return response([ 
            'user' => new UserResource($request->user()), 
            'message' => 'Successful'
        ], 200);
    }
}
