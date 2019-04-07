<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('/compiler');
        // if (Auth::user()->administrator) {
        //     return redirect('/dashboard');
        // } else {
        //     return redirect('/compiler');
        // }
    }
}
