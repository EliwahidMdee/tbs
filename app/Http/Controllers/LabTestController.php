<?php
namespace App\Http\Controllers;


use App\Models\LabTest;
use Illuminate\Http\Request;

class LabTestController extends Controller
{
    public function index()
    {
        $labTests = LabTest::all();
        return view('labtests.labtests', compact('labTests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'test_name' => 'required|string|max:100',
            'test_price' => 'required|numeric',
        ]);

        LabTest::create($request->all());

        return redirect()->route('labtests.index')->with('success', 'Lab Test added successfully.');
    }
}
