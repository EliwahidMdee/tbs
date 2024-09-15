<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Notifications\PatientAssigned;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.doctors', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'specialty' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'hired_date' => 'required|date',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }
    public function assignDoctor(Request $request, Patient $patient)
    {
        // Assign doctor logic
        // ...
        $doctor ->notify(new PatientAssigned($patient));
        return redirect()->route('patients.show', $patient)->with('success', 'Doctor assigned successfully.');
    }

    public function updateSymptoms(Request $request, Patient $patient)
    {
        // Update symptoms logic
        // ...
        return redirect()->route('patients.show', $patient)->with('success', 'Symptoms updated successfully.');
    }

}
