<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function index(){
        dd('Hello, I am your Admin Page');
    }
}
