<?php

namespace Bolao\Http\Controllers\API;

use Bolao\Models\User;
use Bolao\Http\Controllers\Controller;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get($userId = null)
    {
        if($userId){
            return response()->json($this->user->findOrFail($userId));
        } else {
            return response()->json($this->user->all());
        }
    }
}
