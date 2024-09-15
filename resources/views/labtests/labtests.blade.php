@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-vials" style="margin-right: 10px;"></i> Lab Tests
    </h1>

    <!-- Success Message Pop-up -->
    @if (session('success'))
        <div id="successMessage" style="position: fixed; top: 20px; right: 20px; background-color: #28a745; color: #ffffff; padding: 10px 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Lab Test Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Lab Test</button>

    <!-- Modal Structure -->
    <div id="labTestModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            <span class="close" onclick="closeModal()" style="color: #ff4b5c; float: right; font-size: 28px; padding-right: 8px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('labtests.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="test_name" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Test Name:</label>
                    <input type="text" id="test_name" name="test_name" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="test_price" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Test Price:</label>
                    <input type="number" step="0.01" id="test_price" name="test_price" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <button type="submit" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Lab Test</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="container" style="width: 100%; padding: 0; border-radius: 12px; background-color: #fff; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
        <table style="width: 100%; border-collapse: collapse; border-radius: 12px; overflow: hidden;">
            <thead style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #ffffff;">
            <tr>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Test Name</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Test Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($labTests as $labTest)
                <tr style="transition: background-color 0.3s ease;">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #42a5f5; font-weight: bold;">{{ $labTest->test_id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $labTest->test_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $labTest->test_price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('labTestModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('labTestModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('labTestModal')) {
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
