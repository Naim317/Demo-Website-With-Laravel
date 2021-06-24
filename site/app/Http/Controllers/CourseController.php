<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\CourseModel;

class CourseController extends Controller
{
   function coursePage(){
       $CourseData = json_decode(CourseModel::orderBy('id','desc')->get());

       return view('Course',['CourseData'=> $CourseData]);
   }
}
