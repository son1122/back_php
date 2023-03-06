<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\v1\Controller;

class login extends Controller
{
    //
    public function login(){

        return view('/login');
    }
    public function register(){

        return view('/register');
    }
}
