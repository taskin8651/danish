<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use App\Models\ContactDetail;
use App\Models\ServiceType;
use App\Models\Project;


class ServiceController extends Controller
{
    public function index()
    {
        // Sab services fetch karenge
        $services = ServiceDetail::with('media')->get();

        $contact = ContactDetail::first();

        return view('custom.service', compact('services', 'contact'));
    }

  public function show($id)
{
    $service = ServiceDetail::with([
        'media',
        'projects',
        'projects.media',
        'projects.service_type',
        'reviews',
        'payments'
    ])->findOrFail($id);

    

    $types = ServiceType::all();

    return view('custom.service-details', compact('service', 'types'));
}
  





}
