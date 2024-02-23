<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // from Service model

        return view('frontend.services', ['services' => $services]);
    }

    public function show($id)
    {
        $service = Service::find($id); // Fetch the service from the database

        return view('service.show', ['service' => $service]);
    }
}