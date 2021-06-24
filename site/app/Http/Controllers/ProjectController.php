<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectsModel;

class ProjectController extends Controller
{
    function projectPage(){
        $ProjectData = json_decode(ProjectsModel::orderBy('id','desc')->get());
        return view('Project',['ProjectData' => $ProjectData]);
    }
}
