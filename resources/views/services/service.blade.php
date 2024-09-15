@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-concierge-bell" style="margin-right: 10px;"></i> Services
    </h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Add Service Button -->
    <button onclick="openModal()" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-bottom: 20px;">Add Service</button>

    <!-- Modal Structure -->
    <div id="serviceModal" class="modal" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
        <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 0; width: 80%; max-width: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); position: absolute; left: 25%; right: 25%; top: -15%;">
            <span class="close" onclick="closeModal()" style="color: #ff4b5c; float: right; padding-right: 8px; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <form action="{{ route('services.store') }}" method="POST" style="background: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #333;">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="service_name" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Service Name:</label>
                    <input type="text" id="service_name" name="service_name" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="description" style="font-weight: bold; color: black; display: block; margin-bottom: 8px; font-size: 14px;">Service Description:</label>
                    <textarea id="description" name="description" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;"></textarea>
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="price" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 14px;">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <button type="submit" style="background-color: #007bff; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%;">Add Service</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="container" style="width: 100%; padding: 0; border-radius: 12px; background-color: #fff; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
        <table style="width: 100%; border-collapse: collapse; border-radius: 12px; overflow: hidden;">
            <thead style="background: #007bff; color: #ffffff;">
            <tr>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">ID</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Service Name</th>
                <th style="padding: 15px; text-align: left; font-size: 14px; text-transform: uppercase; letter-spacing: 0.1em;">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($services as $service)
                <tr style="transition: background-color 0.3s ease;">
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #007bff; font-weight: bold;">{{ $service->id }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $service->service_name }}</td>
                    <td style="padding: 15px; text-align: left; font-size: 14px; color: #333;">{{ $service->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function openModal() {
            document.getElementById('serviceModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('serviceModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('serviceModal')) {
                closeModal();
            }
        }
    </script>
@endsection
