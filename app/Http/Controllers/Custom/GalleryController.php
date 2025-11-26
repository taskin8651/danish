<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\ServiceType;

class GalleryController extends Controller
{
   public function index()
{
    $serviceTypes = ServiceType::all(); // Tabs
    $galleries = Gallery::with('service_type')->get(); // All gallery items

    return view('custom.gallery', compact('serviceTypes', 'galleries'));
}
}
   
