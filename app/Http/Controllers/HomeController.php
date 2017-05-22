<?php

namespace Bolao\Http\Controllers;

use Bolao\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boloes = User::all();
        return view('bolao.home', ['boloes' => $boloes]);
    }
}
