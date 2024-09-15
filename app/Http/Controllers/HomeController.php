<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Visit;
use App\Models\Appointment;
use App\Models\Earning;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPatients = Patient::count();
        $totalDoctors = Doctor::count();
        $totalVisits = Visit::count();
        $totalAppointments = Appointment::count();
        $totalEarnings = Earning::sum('amount');

        // Example data for charts
        $earningsLabels = ['January', 'February', 'March', 'April', 'May'];
        $earningsData = [1000, 1500, 2000, 2500, 3000];

        $patientsLabels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $patientsData = [10, 20, 30, 40, 50];

        return view('home', compact(
            'totalPatients',
            'totalDoctors',
            'totalVisits',
            'totalAppointments',
            'totalEarnings',
            'earningsLabels',
            'earningsData',
            'patientsLabels',
            'patientsData'
        ));
    }
}
