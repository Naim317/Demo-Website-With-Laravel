<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;
use App\CourseModel;
use App\ProjectsModel;
use App\ReviewModel;
use App\ServicesModel;
use App\VisitorModel;

class HomeController extends Controller
{
    function HomeIndex(){
       $Total_contact = ContactModel::count();
       $Total_course = CourseModel::count();
       $Total_project =ProjectsModel::count();
       $Total_review =ReviewModel::count();
       $Total_service = ServicesModel::count();
       $Total_visitor = VisitorModel::count();

 
        return view('Home', [
            'Total_contact' =>$Total_contact,
            'Total_course' =>$Total_course,
            'Total_project' =>$Total_project,
            'Total_review' =>$Total_review,
            'Total_service' =>$Total_service,
            'Total_visitor' =>$Total_visitor

        ]);
    }
}
