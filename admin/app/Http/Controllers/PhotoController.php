<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    function photoIndex(){
        return view('Photo');
    }
}
