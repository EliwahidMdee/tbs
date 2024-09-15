@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-calendar-alt" style="margin-right: 10px;"></i> Appointments
    </h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Add Appointment Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Appointment</button>

    <!-- Modal Structure -->
    <div id="appointmentModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); position: absolute; left: 25%; right: 25%; top: -15%;">
            <span class="close" onclick="closeModal()" style="color: #dc3545; padding-right: 8px; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('appointments.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="patient_id" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Patient ID:</label>
                    <input type="text" id="patient_id" name="patient_id" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="doctor_id" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Doctor ID:</label>
                    <input type="text" id="doctor_id" name="doctor_id" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="appointment_date" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Appointment Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="purpose" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Purpose:</label>
                    <input type="text" id="purpose" name="purpose" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="status" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Status:</label>
                    <select id="status" name="status" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                        <option value="Scheduled">Scheduled</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Appointment</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="container" style="width: 100%; padding: 0; border-radius: 12px; background-color: #f0f1f6; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
        <table style="width: 100%; border-collapse: collapse; border-radius: 12px; overflow: hidden;">
            <thead style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #ffffff;">
            <tr>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Patient ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Doctor ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Appointment Date</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Purpose</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($appointments as $appointment)
                <tr style="transition: background-color 0.3s ease;">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #42a5f5; font-weight: bold;">{{ $appointment->id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $appointment->patient_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $appointment->doctor_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $appointment->appointment_date }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $appointment->purpose }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $appointment->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('appointmentModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('appointmentModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('appointmentModal')) {
                closeModal();
            }
        }
    </script>
@endsection
