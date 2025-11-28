<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use App\Models\Team;
use App\Models\Project;
use App\Models\ContactDetail;
use App\Models\ServiceType;
use App\Models\Brand;


class IndexController extends Controller
{
    public function index()
    {
        $serviceDetails = ServiceDetail::all();
        $teams = Team::all();
        $projects = Project::with('service_type')->get(); // Fetch all projects
        $contactDetails = ContactDetail::first(); // Fetch the first contact detail
         $serviceTypes = ServiceType::all(); // Fetch all service types
         $brands = Brand::all();

         

        return view('custom.index', compact('serviceDetails', 'teams', 'projects', 'contactDetails', 'serviceTypes', 'brands'));
    }
}
