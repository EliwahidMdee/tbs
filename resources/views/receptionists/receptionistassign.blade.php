@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
            <i class="fas fa-user-md" style="margin-right: 10px;"></i> Assign Patient to Doctor
        </h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('receptionist.assignDoctor', ['patient' => $patient->id]) }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #333;">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="patient_id" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Select Patient</label>
                <select name="patient_id" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="doctor_id" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Select Doctor</label>
                <select name="doctor_id" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Assign Patient</button>
        </form>
    </div>
@endsection
