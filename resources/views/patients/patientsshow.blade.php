@extends('layouts.app')

@section('content')
    <div class="container" style="background: linear-gradient(135deg, #42a5f5, #478ed1); padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); color: #ffffff;">
        <h1 style="font-size: 24px; color: #ffffff;">Patient Details</h1>

        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'PatientDetails')" id="defaultOpen">Patient Details</button>
            <button class="tablinks" onclick="openTab(event, 'AssignedDoctor')">Assigned Doctor</button>
            <button class="tablinks" onclick="openTab(event, 'Symptoms')">Symptoms</button>
            <button class="tablinks" onclick="openTab(event, 'Tests')">Tests</button>
            <button class="tablinks" onclick="openTab(event, 'Prescriptions')">Prescriptions</button>
            <button class="tablinks" onclick="openTab(event, 'Billing')">Billing</button>
        </div>

        <!-- Tab content -->
        <div id="PatientDetails" class="tabcontent">
            <div class="card" style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #333;">
                <div class="card-header">
                    <h2>{{ $patient->first_name }} {{ $patient->last_name }}</h2>
                </div>
                <div class="card-body">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="padding: 10px; text-align: left;">Date of Birth</th>
                            <td style="padding: 10px;">{{ $patient->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Gender</th>
                            <td style="padding: 10px;">{{ $patient->gender }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Phone Number</th>
                            <td style="padding: 10px;">{{ $patient->phone_number }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Address</th>
                            <td style="padding: 10px;">{{ $patient->address }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Email</th>
                            <td style="padding: 10px;">{{ $patient->email }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Marital Status</th>
                            <td style="padding: 10px;">{{ $patient->marital_status }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Nationality</th>
                            <td style="padding: 10px;">{{ $patient->nationality }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Occupation</th>
                            <td style="padding: 10px;">{{ $patient->occupation }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Drug Allergies</th>
                            <td style="padding: 10px;">{{ $patient->drug_allergies }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 10px; text-align: left;">Food Allergies</th>
                            <td style="padding: 10px;">{{ $patient->food_allergies }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div id="AssignedDoctor" class="tabcontent">
            <div class="card" style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #333;">
                <div class="card-header">
                    <h2>Assigned Doctor</h2>
                </div>
                <div class="card-body">
                    @if($doctor)
                        <p><i class="fas fa-user-md"></i> {{ $doctor->first_name . ' ' . $doctor->last_name }}</p>
                        <p>Specialization: {{ $doctor->specialty }}</p>
                        <p>Phone Number: {{ $doctor->phone_number }}</p>
                        <p>Email: {{ $doctor->email }}</p>
                    @else
                        <p>No doctor assigned.</p>
                    @endif
                    <a href="{{ route('receptionist.assign', $patient->id) }}" style="background-color: #ff4b5c; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; text-decoration: none;">Assign</a>
                </div>
            </div>
        </div>

        <div id="Symptoms" class="tabcontent">
            <div class="symptoms">
                <form action="{{ route('patient.symptoms.store', $patient->id) }}" method="POST" style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
                    @csrf
                    <div class="form-group">
                        <label for="symptom" style="color: #333; font-weight: bold;">Symptom</label>
                        <<input type="text" id="symptom" name="symptom" class="form-control" required style="border: 1px solid #ccc; border-radius: 10px; padding-left: 10px; height: 100px; width: 1200px; padding-bottom: 20px;">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #42a5f5; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; margin-bottom: 20px; position: relative; top: 20px;">Add Symptom</button> </form>
            </div>
        </div>

        <div id="Tests" class="tabcontent">
            <div class="card" style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #333;">
                <div class="card-body">
                    <!-- Display tests details -->
                </div>
            </div>
        </div>

        <div id="Prescriptions" class="tabcontent">
            <div class="card" style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #333;">
                <div class="card-body">
                    <form action="{{ route('patient.prescriptions.assign', $patient->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="prescription" style="color: #333; font-weight: bold;">Select Prescription</label>
                            <select id="prescription" name="prescription_id" class="form-control" required style="border: 1px solid #ccc; border-radius: 10px; padding-left: 10px; width: 100%; height: 40px;">
                                <option value="" style="color: #000000; font-size: 16px;">Select a prescription</option>
                                @foreach($prescriptions as $prescription)
                                    <option value="{{ $prescription->id }}" style="color: #000000; font-size: 16px;">{{ $prescription->medication_name }} - Dosage: {{ $prescription->dosage }} - Price: ${{ $prescription->price }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #ff4b5c; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; margin-top: 20px;">Assign Prescription</button>
                    </form>
                    <h3 style="color: #333; font-weight: bold; margin-top: 20px;">Assigned Prescriptions</h3>
                    <ul>
                        @foreach($patient->prescriptions as $prescription)
                            <li style="color: #000000; font-size: 16px;">{{ $prescription->medication_name }} - Dosage: {{ $prescription->dosage }} - Price: ${{ $prescription->price }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        <div id="Billing" class="tabcontent">
            <div class="card" style="background: linear-gradient(135deg, #42a5f5, #478ed1); color: #333;">
                <div class="card-body">
                    <!-- Display billing details -->
                </div>
            </div>
        </div>
    </div>

    <style>
        .tab {
            overflow: hidden;
            border-bottom: 1px solid #ccc;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: #ffffff;
        }

        .tab button:hover {
            background-color: #ddd;
            color: #000;
        }

        .tab button.active {
            background-color: #ccc;
            color: #000;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
        }
    </style>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();
    </script>
@endsection
