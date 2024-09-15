<?php
namespace App\Http\Controllers;


use App\Models\Visit;
use Illuminate\Http\Request;


class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::all();
        return view('visits.visits', compact('visits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'doctors_id' => 'required|integer|exists:doctors,doctor_id',
            'visit_date' => 'required|date',
            'visit_reason' => 'nullable|string|max:255',
            'consultation_fee' => 'nullable|numeric',
        ]);

        Visit::create($request->all());

        return redirect()->route('visits.index')->with('success', 'Visit added successfully.');
    }
}
