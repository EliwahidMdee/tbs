<?php
namespace App\Http\Controllers;

use App\Models\LabTechnician;
use App\Models\Patient;
use Illuminate\Http\Request;

class LabTechnicianController extends Controller
{
    public function index()
    {
        $labTechnicians = LabTechnician::all();
        return view('labtechnicians.labtechnicians', compact('labTechnicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:lab_technicians',
            'phone_number' => 'required|string|max:15',
            'hired_date' => 'required|date',
        ]);

        LabTechnician::create($request->all());

        return redirect()->route('labtechnicians.index')->with('success', 'Lab Technician created successfully.');
    }

    public function assignTests(Request $request, Patient $patient)
    {
        // Assign tests logic
        // ...
        return redirect()->route('patients.show', $patient)->with('success', 'Tests assigned successfully.');
    }

    public function updateResults(Request $request, Patient $patient)
    {
        // Update results logic
        // ...
        return redirect()->route('patients.show', $patient)->with('success', 'Results updated successfully.');
    }
}
