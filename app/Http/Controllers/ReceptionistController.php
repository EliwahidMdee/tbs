<?php

namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Receptionist;
use Illuminate\Http\Request;


class ReceptionistController extends Controller
{
    public function index()
    {
        $receptionists = Receptionist::all();
        return view('receptionists.receptionistindex', compact('receptionists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:receptionists',
            'phone_number' => 'required|string|max:15',
            'hired_date' => 'required|date',
        ]);

        Receptionist::create($request->all());

        return redirect()->route('receptionists.create')->with('success', 'Receptionist created successfully.');
    }

    public function showAssignForm($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $doctors = Doctor::all();
        $patients = Patient::all(); // Retrieve all patients
        return view('receptionists.receptionistassign', compact('patient', 'doctors', 'patients'));
    }

    public function assignDoctor(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $patient = Patient::find($request->patient_id);
        $patient->doctor_id = $request->doctor_id;
        $patient->save();

        return redirect()->route('patients.show', ['patient' => $patient->id])->with('success', 'Patient assigned to doctor successfully.');
    }
}
