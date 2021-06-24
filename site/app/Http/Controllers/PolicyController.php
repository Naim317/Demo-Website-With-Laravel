<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    function policyPage(){
        return view('Policy');
    }
}
