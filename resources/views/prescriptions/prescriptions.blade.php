@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-prescription-bottle-alt" style="margin-right: 10px;"></i> Prescriptions
    </h1>

    <!-- Success Message Pop-up -->
    @if (session('success'))
        <div id="successMessage" style="position: fixed; top: 20px; right: 20px; background-color: #28a745; color: #ffffff; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Prescription Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Prescription</button>

    <!-- Modal Structure -->
    <div id="prescriptionModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); position: absolute; left: 25%; right: 25%; top: -15%;">
            <span class="close" onclick="closeModal()" style="color: #dc3545; padding-right: 8px; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('prescriptions.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="medication_name" style="font-weight: bold; color: black;display: block; margin-bottom: 8px; font-size: 14px;">Medication Name:</label>
                    <input type="text" id="medication_name" name="medication_name" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="dosage" style="font-weight: bold; color: black;display: block; margin-bottom: 8px; font-size: 14px;">Dosage:</label>
                    <input type="text" id="dosage" name="dosage" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="price" style="font-weight: bold; color: black;display: block; margin-bottom: 8px; font-size: 14px;">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <button type="submit" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Prescription</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="container" style="width: 100%; padding: 0; border-radius: 12px; background-color: #f0f1f6; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
        <table style="width: 100%; border-collapse: collapse; border-radius: 12px; overflow: hidden;">
            <thead style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #ffffff;">
            <tr>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Medication Name</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Dosage</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($prescriptions as $prescription)
                <tr style="transition: background-color 0.3s ease;">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #42a5f5; font-weight: bold;">{{ $prescription->id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $prescription->medication_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $prescription->dosage }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $prescription->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('prescriptionModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('prescriptionModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('prescriptionModal')) {
                closeModal();
            }
        }

        // Hide the success message after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
@endsection
