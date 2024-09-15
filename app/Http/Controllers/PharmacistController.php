<?php
namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Illuminate\Http\Request;


class PharmacistController extends Controller
{
    public function index()
    {
        $pharmacists = Pharmacist::all();
        return view('pharmacists.pharmacist', compact('pharmacists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'hired_date' => 'required|date',
        ]);

        Pharmacist::create($request->all());

        return redirect()->route('pharmacists.index')->with('success', 'Pharmacist added successfully.');
    }
}
