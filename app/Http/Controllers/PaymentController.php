<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.payments', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit_id' => 'required|integer',
            'total_amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:100',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }
}
