<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class DemoController extends Controller
{
    public function home2() {
        return view('home2');
    }

    public function navbar() {
        return view('navbar');
    }

    public function contact() {
        return view('contact');
    }

    public function about() {
        return view('about');
    }
    
    public function footer() {
        return view('footer');
    }

    
    public function master() {
        return view('master');
    }    
}
