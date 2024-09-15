@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-user-injured" style="margin-right: 10px;"></i> Patients
    </h1>

    @if (session('success'))
        <div class="alert-popup alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Patients Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Patients</button>

    <!-- Modal Structure -->
    <div id="patientModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); position: absolute; left: 25%; right: 25%; top: -15%;">
            <span class="close" onclick="closeModal()" style="color: #dc3545; padding-right: 8px; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('patients.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="first_name" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">First Name:</label>
                    <input type="text" id="first_name" name="first_name" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="last_name" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="date_of_birth" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="gender" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Gender:</label>
                    <input type="text" id="gender" name="gender" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="phone_number" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="address" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Address:</label>
                    <input type="text" id="address" name="address" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="email" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Email:</label>
                    <input type="email" id="email" name="email" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="marital_status" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Marital Status:</label>
                    <input type="text" id="marital_status" name="marital_status" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="nationality" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="occupation" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Occupation:</label>
                    <input type="text" id="occupation" name="occupation" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="drug_allergies" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Drug Allergies:</label>
                    <textarea id="drug_allergies" name="drug_allergies" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;"></textarea>
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="food_allergies" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Food Allergies:</label>
                    <textarea id="food_allergies" name="food_allergies" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;"></textarea>
                </div>
                <button type="submit" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Patient</button>
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
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Date of Birth</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Gender</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Phone Number</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Address</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Email</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($patients as $patient)
                <tr style="transition: background-color 0.3s ease;">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #42a5f5; font-weight: bold;">{{ $patient->id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $patient->first_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $patient->last_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $patient->date_of_birth }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $patient->gender }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $patient->phone_number }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $patient->address }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333; word-break: break-word;">{{ $patient->email }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">
                        <a href="{{ route('patients.show', $patient->id) }}" style="background-color: #42a5f5; color: #ffffff; padding: 5px 10px; border-radius: 5px; text-decoration: none;">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .alert-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: none;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .alert-popup.alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var alertPopup = document.querySelector('.alert-popup');
            if (alertPopup) {
                alertPopup.style.display = 'block';
                setTimeout(function() {
                    alertPopup.style.display = 'none';
                }, 5000); // Hide after 5 seconds
            }
        });

        function openModal() {
            document.getElementById('patientModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('patientModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('patientModal')) {
                closeModal();
            }
        }
    </script>
@endsection
