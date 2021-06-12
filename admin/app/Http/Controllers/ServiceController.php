<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesModel;

class ServiceController extends Controller
{
    function ServiceIndex(){
 
        


        return view('Services');
    }
    function getServicesData(){
        $result = json_encode(ServicesModel::all());
        return $result;
    }

    function serviceDelete(Request $request){

       $id = $request->input('id');
       $res = ServicesModel::where('id','=',$id)->delete();
       if($res==true){
           return 1;
       }
       else{
        return 0;

       }

        
    }
}

