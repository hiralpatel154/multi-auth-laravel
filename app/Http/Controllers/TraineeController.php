<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraineeController extends Controller
{
    public function abc(){
        return view('abc');
    }
    public function index()
    {
        return view('admin');
    }
}
