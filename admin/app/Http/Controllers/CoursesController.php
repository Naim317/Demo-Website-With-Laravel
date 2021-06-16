<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CoursesController extends Controller
{
    function CoursesIndex(){
 
        return view('Courses');
    }



    function getCoursesData(){
        $result = json_encode(CourseModel::all());
        return $result;
    }


    function getCoursesDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(CourseModel::where('id','=',$id)->get());
        return $result;
    }


    function CoursesDelete(Request $request){

        $id = $request->input('id');
        $res = CourseModel::where('id','=',$id)->delete();
        if($res==true){
            return 1;
        }
        else{
         return 0;
 
        }
 
         
     }

     function coursesUpdate(Request $request){

        $course_name= $request->input('course_name');
        $course_des= $request->input('course_des');
        $course_fee= $request->input('course_fee');
        $course_totalenroll= $request->input('course_totalenroll');
        $course_totalclass= $request->input('course_totalclass');
        $course_link= $request->input('course_link');
        $course_img= $request->input('course_img');

        $res = CourseModel::where('id','=',$id)->update([
            'course_name' => $course_name,
            'course_des' => $course_des,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
        ]);
        if($res==true){
            return 1;
        }
        else{
         return 0;
 
        }
    }



    function coursesAdd(Request $request){


        $course_name= $request->input('course_name');
        $course_des= $request->input('course_des');
        $course_fee= $request->input('course_fee');
        $course_totalenroll= $request->input('course_totalenroll');
        $course_totalclass= $request->input('course_totalclass');
        $course_link= $request->input('course_link');
        $course_img= $request->input('course_img');
        $res = CourseModel::insert([
            'course_name' => $course_name,
            'course_des' => $course_des,
            'course_fee' => $course_fee,
            'course_totalenroll' => $course_totalenroll,
            'course_totalclass' => $course_totalclass,
            'course_link' => $course_link,
            'course_img' => $course_img
       
        
        ]);
        if($res==true){
            return 1;
        }
        else{
         return 0;
 
        }
 
         
     }



}
