<?php
namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;


class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('prescriptions.prescriptions', compact('prescriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:100',
            'price' => 'required|numeric',
        ]);

        Prescription::create($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Prescription added successfully.');
    }
}
