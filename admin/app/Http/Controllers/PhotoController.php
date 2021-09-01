<?php

namespace App\Http\Controllers;
use App\PhotoModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    function photoIndex(){
        return view('Photo');
    }

    function photoJsonData(){
      return PhotoModel::take(8)->get();

    }
    function photoDelete(Request $request){
      $OldPhotoURL = $request->input('location');
      $OldPhotoID = $request->input('id');


      $OldPhotoURLArray = explode("/",$OldPhotoURL);
      $OldPhotoName = end($OldPhotoURLArray);
      $DeletePhotoFile = Storage::delete('public/',$OldPhotoName);

      $DeleteFrmDataBase = PhotoModel::where('id', '=', $OldPhotoID)->delete();


      return $DeleteFrmDataBase;


    }

    function photoJsonDataByID(Request $request){
        $FirstID = $request->id;
        $LastID = $FirstID + 8;
        return PhotoModel::where('id', '>=', $FirstID)->where('id', '<', $LastID)->get();

      }



    function PhotoUpload(Request $request){
        $photoPath = $request->file('photo')->store('public');
        $PhotoName = (explode('/',$photoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "https://" .$host."/storage/".$PhotoName;
        $result = PhotoModel::insert(['location' => $location]);
        return $result;
    }
}
