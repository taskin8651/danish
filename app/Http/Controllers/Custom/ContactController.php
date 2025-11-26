<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\ContactDetail;
use App\Models\ServiceDetail;

class ContactController extends Controller
{
   
public function index()
{
    $contact = ContactDetail::first();
    $serviceTypes = ServiceDetail::all(); // Fetch all service types
    return view('custom.contact', compact('contact', 'serviceTypes'));
}

public function store(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'number'  => 'required',
        'service_type_id' => 'required|exists:service_types,id', // validate selected service type
        'message' => 'required|string',
    ]);
    // dd($request->all());

    Enquiry::create([
        'name'            => $request->name,
        'email'           => $request->email,
        'number'          => $request->number,
        'service_type_id' => $request->service_type_id,
        'description'     => $request->message,
    ]);

    

    return back()->with('success', 'Your message has been sent successfully!');
}

}
