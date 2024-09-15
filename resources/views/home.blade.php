@extends('layouts.app')

@section('content')
    <h1 style="display: flex; align-items: center; font-size: 24px; color: #6a11cb; margin-bottom: 20px;">
        <i class="fas fa-home" style="margin-right: 10px;"></i> Dashboard
    </h1>
                        @if (session('status'))
                            <div>
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="statistics mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stat-item bg-primary">
                                        <h4>Total Patients</h4>
                                        <p>{{ $totalPatients }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stat-item bg-warning">
                                        <h4>Total Visits</h4>
                                        <p>{{ $totalVisits }}</p>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="stat-item bg-info">
                                        <h4>Total Appointments</h4>
                                        <p>{{ $totalAppointments }}</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="stat-item bg-danger">
                                        <h4>Total Earnings</h4>
                                        <p>${{ number_format($totalEarnings, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="chart-container">
                            <div class="chart">
                                <canvas id="earningsChart"></canvas>
                            </div>
                            <div class="chart">
                                <canvas id="patientsChart"></canvas>
                            </div>
                        </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctxEarnings = document.getElementById('earningsChart').getContext('2d');
        var earningsChart = new Chart(ctxEarnings, {
            type: 'line',
            data: {
                labels: @json($earningsLabels),
                datasets: [{
                    label: 'Earnings',
                    data: @json($earningsData),
                    backgroundColor: 'rgb(66,165,245)',
                    borderColor: 'rgb(66,165,245)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxPatients = document.getElementById('patientsChart').getContext('2d');
        var patientsChart = new Chart(ctxPatients, {
            type: 'bar',
            data: {
                labels: @json($patientsLabels),
                datasets: [{
                    label: 'Patients per Day',
                    data: @json($patientsData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <style>
        .stat-item {
            background-color: #42a5f5;
            color: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 15px;

        }

        .col-md-4 {
            flex: 1 1 calc(50% - 20px);
            box-sizing: border-box;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            width: 100%;

        }

        .statistics {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-end;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f9;
        }
    </style>
@endsection
