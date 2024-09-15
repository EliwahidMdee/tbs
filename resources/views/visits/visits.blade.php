@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-notes-medical" style="margin-right: 10px;"></i> Visits
    </h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Add Visit Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Visit</button>

    <!-- Modal Structure -->
    <div id="visitModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); position: absolute; left: 25%; right: 25%; top: -15%;">
            <span class="close" onclick="closeModal()" style="color: #ff4b5c; float: right; font-size: 28px; padding-right: 8px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('visits.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="patient_id" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Patient ID:</label>
                    <input type="number" id="patient_id" name="patient_id" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="doctor_id" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Doctor ID:</label>
                    <input type="number" id="doctor_id" name="doctor_id" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="visit_date" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Visit Date:</label>
                    <input type="date" id="visit_date" name="visit_date" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="visit_reason" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Visit Reason:</label>
                    <input type="text" id="visit_reason" name="visit_reason" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="consultation_fee" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Consultation Fee:</label>
                    <input type="number" step="0.01" id="consultation_fee" name="consultation_fee" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <button type="submit" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Visit</button>
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
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Visit Date</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Visit Reason</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Consultation Fee</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($visits as $visit)
                <tr style="transition: background-color 0.3s ease;">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #42a5f5; font-weight: bold;">{{ $visit->visits_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $visit->patient_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $visit->doctor_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $visit->visit_date }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $visit->visit_reason }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $visit->consultation_fee }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('visitModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('visitModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('visitModal')) {
                closeModal();
            }
        }
    </script>
@endsection
