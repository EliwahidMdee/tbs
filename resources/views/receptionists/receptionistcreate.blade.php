@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
            <i class="fas fa-user-plus" style="margin-right: 10px;"></i> Create Receptionist
        </h1>

        <form action="{{ route('receptionists.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #333;">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="first_name" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">First Name</label>
                <input type="text" name="first_name" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="last_name" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Last Name</label>
                <input type="text" name="last_name" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Email</label>
                <input type="email" name="email" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="phone_number" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="hired_date" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Hired Date</label>
                <input type="date" name="hired_date" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Create Receptionist</button>
        </form>
    </div>
@endsection
