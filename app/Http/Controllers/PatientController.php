<?php
namespace App\Http\Controllers;


use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.patients', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'marital_status' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'drug_allergies' => 'nullable|string',
            'food_allergies' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'marital_status' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'drug_allergies' => 'nullable|string',
            'food_allergies' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $doctor = $patient->doctor;
        $prescriptions = Prescription::all(); // Add this line to fetch all prescriptions

        return view('patients.patientsshow', compact('patient', 'doctor', 'prescriptions'));
    }
    public function storeSymptom(Request $request, Patient $patient)
    {
        $request->validate([
            'symptom' => 'required|string|max:255',
        ]);

        $patient->symptoms()->create([
            'description' => $request->symptom,
        ]);

        return redirect()->back()->with('success', 'Symptom added successfully.');
    }
    public function assignPrescription(Request $request, $patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $prescriptionId = $request->input('prescription_id');

        // Attach the prescription to the patient
        $patient->prescriptions()->attach($prescriptionId);

        // Redirect back to the patient's show page
        return redirect()->route('patients.show', $patientId);
    }
}
