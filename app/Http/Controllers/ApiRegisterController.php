<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Response;
use JWTAuth;

class ApiRegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    /**
     * User register function
     */
    public function register(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        
        $user = User::first();
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));

    }
}
