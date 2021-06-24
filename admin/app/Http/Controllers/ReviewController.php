<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewModel;

class ReviewController extends Controller
{
    function ReviewIndex(){
 
        return view('Review');
    }



    function getReviewData(){
        $result = json_encode(ReviewModel::orderBy('id','desc')->get());
        return $result;
    }



    function  ReviewDelete(Request $request){

        $id = $request->input('id');
        $res = ReviewModel::where('id','=',$id)->delete();
        if($res==true){
            return 1;
        }
        else{
         return 0;
 
        }
 
         
     }
}
