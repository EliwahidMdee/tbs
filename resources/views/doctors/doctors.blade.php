@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-user-md" style="margin-right: 10px;"></i> Doctors
    </h1>

    @if (session('success'))
        <div id="successMessage" class="success-popup">{{ session('success') }}</div>
    @endif

    <!-- Add Doctors Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Doctors</button>

    <!-- Modal Structure -->
    <div id="doctorModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); position: absolute; left: 25%; right: 25%; top: -15%; ">
            <span class="close" onclick="closeModal()" style="color: #dc3545; padding-right: 8px; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('doctors.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="first_name" style="font-weight:  bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="last_name" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="specialty" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Specialty:</label>
                    <input type="text" id="specialty" name="specialty" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="phone_number" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="email" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Email:</label>
                    <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="hired_date" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Hired Date:</label>
                    <input type="date" id="hired_date" name="hired_date" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <button type="submit" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Doctor</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="container" style="width: 100%; padding: 0; border-radius: 12px; background-color: #f0f1f6; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
        <table style="width: 100%; border-collapse: collapse; border-radius: 12px; overflow: hidden;">
            <thead style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #ffffff;">
            <tr>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">First Name</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Last Name</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Specialty</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Phone Number</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Email</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Hired Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($doctors as $doctor)
                <tr style="transition: background-color 0.3s ease-in-out">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333; font-weight: bold;">{{ $doctor->doctor_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $doctor->first_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $doctor->last_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $doctor->specialty }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $doctor->phone_number }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333; word-break: break-word;">{{ $doctor->email }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $doctor->hired_date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('doctorModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('doctorModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('doctorModal')) {
                closeModal();
            }
        }

        // Show success message for 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
@endsection

<style>
    .success-popup {
        display: none;
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #28a745;
        color: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }
</style>
