<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\LabTechnician;
use App\Models\Cashier;
use App\Models\Receptionist;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorsCount = Doctor::count();
        $labTechniciansCount = LabTechnician::count();
        $cashiersCount = Cashier::count();
        $receptionistsCount = Receptionist::count();

        return view('staff.index', compact('doctorsCount', 'labTechniciansCount', 'cashiersCount', 'receptionistsCount'));
    }
}
