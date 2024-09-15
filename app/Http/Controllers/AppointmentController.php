<?php
namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
public function index()
{
$appointments = Appointment::all();
return view('appointments.appointments', compact('appointments'));
}

public function store(Request $request)
{
$request->validate([
'patient_id' => 'required|integer',
'doctor_id' => 'required|integer',
'appointment_date' => 'required|date',
'purpose' => 'required|string|max:255',
'status' => 'required|string|in:Scheduled,Completed,Cancelled',
]);

$appointment = Appointment::create($request->all());

return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
}
}
