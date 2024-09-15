<?php
namespace App\Http\Controllers;


use App\Models\Cashier;
use App\Models\Patient;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        $cashiers = Cashier::all();
        return view('cashiers.cashier', compact('cashiers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Cashier::create($request->all());

        return redirect()->route('cashiers.index')->with('success', 'Cashier added successfully.');
    }
    public function generateBill(Request $request, Patient $patient)
    {
        // Generate bill logic
        // ...
        return redirect()->route('patients.show', $patient)->with('success', 'Bill generated successfully.');
    }
}
