<?php
namespace App\Http\Controllers;


use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.service', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'price' => 'required|numeric',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }
}
