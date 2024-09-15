<!-- resources/views/staff/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Doctors Box -->
            <div class="col-md-3 mb-3">
                <div class="stat-box bg-primary">
                    <i class="fas fa-user-md fa-2x"></i>
                    <h3>Doctors</h3>
                    <p>Total: {{ $doctorsCount }}</p>
                    <a href="{{ route('doctors.index') }}" class="details-link">More Details</a>
                </div>
            </div>

            <!-- Lab Technicians Box -->
            <div class="col-md-3 mb-3">
                <div class="stat-box bg-success">
                    <i class="fas fa-flask fa-2x"></i>
                    <h3>Lab Technicians</h3>
                    <p>Total: {{ $labTechniciansCount }}</p>
                    <a href="{{ route('labtechnicians.index') }}" class="details-link">More Details</a>
                </div>
            </div>

            <!-- Cashiers Box -->
            <div class="col-md-3 mb-3">
                <div class="stat-box bg-warning">
                    <i class="fas fa-cash-register fa-2x"></i>
                    <h3>Cashiers</h3>
                    <p>Total: {{ $cashiersCount }}</p>
                    <a href="{{ route('cashiers.index') }}" class="details-link">More Details</a>
                </div>
            </div>

            <!-- Receptionists Box -->
            <div class="col-md-3 mb-3">
                <div class="stat-box bg-info">
                    <i class="fas fa-user-tie fa-2x"></i>
                    <h3>Receptionists</h3>
                    <p>Total: {{ $receptionistsCount }}</p>
                    <a href="{{ route('receptionists.index') }}" class="details-link">More Details</a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Other Stat Boxes -->
            <!-- Example additional stat box -->
           <!-- <div class="col-md-3 mb-3">
                <div class="stat-box bg-danger">
                    <i class="fas fa-notes-medical fa-2x"></i>
                    <h3>Appointments</h3>
                    <p>Total: #</p>
                    <a href="{{ route('appointments.index') }}" class="details-link">More Details</a>
                </div>
            </div> -->

            <!-- Add more stat boxes following the same structure as needed -->
        </div>
    </div>
@endsection

