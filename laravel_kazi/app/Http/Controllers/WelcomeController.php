<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Method/Setter/Action
    public function welcome()
    {
        return view('welcome');
    }
}
