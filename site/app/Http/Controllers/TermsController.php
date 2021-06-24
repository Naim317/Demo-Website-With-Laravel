<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    function termsPage(){
        return view('Terms');
    }
}
