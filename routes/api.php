<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.auth')->get('users', function (Request $request) {
    
    $users = User::all();
    $names = [];

    foreach ($users as $user) {
        $names[] = $user->name;
    }

    return response()->json(compact('names'));
});


// JWT Auth routes
Route::post('user/register', 'ApiRegisterController@register');
Route::post('user/login', 'ApiLoginController@login');