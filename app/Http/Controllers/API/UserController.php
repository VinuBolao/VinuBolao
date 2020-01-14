<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\User;
use Bolao\Http\Controllers\Controller;

class UserController extends Controller
{
    public function get($userId = null)
    {
        if($userId){
            return response()->json(User::findOrFail($userId));
        } else {
            return response()->json(User::all());
        }
    }
}
