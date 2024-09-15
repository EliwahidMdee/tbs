<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/favicon.ico">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #c6e8f1, #e5f7fc)
        }

        .dark-mode {
            background-color: #1c1c1c;
            color: #b0b0b0;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            transition: width 0.3s;
            position: fixed;
            top: 20px;
            bottom: 20px;
            left: 20px;
            color: #fff;
            padding: 20px 0;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .sidebar.minimized {
            width: 80px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
            width: 100%;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar ul li a .icon {
            font-size: 18px;
            margin-right: 15px;
        }

        .sidebar ul li a .text {
            font-size: 18px;
            white-space: nowrap;
            transition: opacity 0.3s;
        }

        .sidebar.minimized ul li a .text {
            opacity: 0;
        }

        .toggle-btn {
            position: absolute;
            top: 20px;
            right: -30px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            cursor: pointer;
            border-radius: 50%;
            transition: transform 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .minimize-btn {
            position: absolute;
            bottom: 20px;
            right: -30px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            cursor: pointer;
            border-radius: 50%;
            transition: transform 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .content {
            margin-left: 290px;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s;
        }

        .sidebar.minimized ~ .content {
            margin-left: 120px;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dark-mode .sidebar {
            background: linear-gradient(135deg, #2a2a2a, #3a3a3a);
        }

        .dark-mode .sidebar ul li a {
            color: #b0b0b0;
        }

        .dark-mode .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dark-mode .toggle-btn {
            background: linear-gradient(135deg, #2a2a2a, #3a3a3a);
        }

        .dark-mode .content {
            background-color: #2a2a2a;
            color: #718096;
        }

        .dark-mode-toggle {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #6a11cb;
            color: #fff;
            border: none;
            border-radius: 20px;
            width: 80px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: background 0.3s;
        }

        .dark-mode-toggle:hover {
            background: #2575fc;
        }

        .user-panel {
            position: absolute;
            top: 20px;
            right: 25px;
            display: flex;
            align-items: center;
            background: #6a11cb;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .user-panel .user-name {
            margin-right: 15px;
            display: inline;
            margin-left: 10px;
        }

        .user-panel .toggle-btn {
            position: absolute;
            top: 10px;
            right: 9px;
            background: none; /* Remove background */
            width: auto; /* Adjust width */
            height: auto; /* Adjust height */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            cursor: pointer;
            border-radius: 0; /* Remove border radius */
            box-shadow: none; /* Remove box shadow */
            padding: 0; /* Remove padding */
        }


        .user-panel .dropdown-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 50px;
            right: 10px;
            background: #6a11cb;
            border-radius: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 10px;
        }

        .user-panel .dropdown-menu a {
            color: #fff;
            text-decoration: none;
            padding: 5px 0;
        }

        .user-panel .dropdown-menu a:hover {
            background: #6a11cb;
        }

        .user-panel .logout-btn {
            background: #2575fc;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .user-panel .logout-btn:hover {
            background: #1a5bb8;
        }



        .chart-container {
            display: flex;
            flex: 1 1 calc(100% - 20px);
            flex-direction: column;
            align-items: flex-end;
            margin-top: -850px;
        }

        .chart {
            width: 200%;
            max-width: 830px; /* Adjust the max-width as needed */
            margin-bottom: 20px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .dropdown-content li a {
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            text-decoration: none;
            display: block;
        }

        .dropdown-content li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .statistics.mt-4 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            width: 80%;
            max-width: 1200px;
            grid-gap: 10px;
        }



        .icon {
            margin-right: 10px;
        }

        .text {
            font-size: 18px;
        }


    </style>
</head>
<body>

<div class="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="minimize-btn" onclick="toggleSidebar()">
        <i class="fas fa-angle-double-left"></i>
    </div>
    <ul>
        <li><a href="{{ route('home') }}"><i class="fas fa-home icon"></i><span class="text">Home</span></a></li>
        <li><a href="{{ route('patients.index') }}"><i class="fas fa-user-injured icon"></i><span class="text">Patients</span></a></li>
        <li><a href="{{ route('appointments.index') }}"><i class="fas fa-calendar-alt icon"></i><span class="text">Appointments</span></a></li>
        <li><a href="{{ route('visits.index') }}"><i class="fas fa-notes-medical icon"></i><span class="text">Visits</span></a></li>
        <li><a href="{{ route('labtests.index') }}"><i class="fas fa-vials icon"></i><span class="text">Lab Tests</span></a></li>
        <li><a href="{{ route('prescriptions.index') }}"><i class="fas fa-prescription-bottle-alt icon"></i><span class="text">Prescriptions</span></a></li>
        <li><a href="{{ route('payments.index') }}"><i class="fas fa-money-check-alt icon"></i><span class="text">Payments</span></a></li>
        <li><a href="{{ route('services.index') }}"><i class="fas fa-concierge-bell icon"></i><span class="text">Services</span></a></li>
        <li><a href="{{ route('staff.index') }}"><i class="fas fa-users icon"></i><span class="text">Staff</span></a></li>
        <li><a href="{{ route('doctors.index') }}"><i class="fas fa-user-md icon"></i><span class="text">Doctors</span></a></li>
        <li><a href="{{ route('pharmacists.index') }}"><i class="fas fa-user-nurse icon"></i><span class="text">Pharmacists</span></a></li>
        <li><a href="{{ route('cashiers.index') }}"><i class="fas fa-cash-register icon"></i><span class="text">Cashiers</span></a></li>
        <li><a href="{{route('labtechnicians.index')}}"><i class="fas fa-vial icon"></i><span class="text">Lab Technicians</span></a></li>
        <li><a href="{{route('receptionists.index')}}"><i class="fas fa-user icon"></i><span class="text">Receptionists</span></a></li>
    </ul>

    <button class="dark-mode-toggle" onclick="toggleDarkMode()">
        <i class="fas fa-moon"></i>
    </button>
</div>

<div class="content">
    <div class="user-panel">
        <i class="fas fa-user"></i>
        <span class="user-name">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
        <span class="toggle-btn" onclick="toggleDropdownMenu()">
            <i class="fas fa-ellipsis-v"></i>
        </span>
        <div class="dropdown-menu">
            <a href="#">Change Password</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
    @yield('content')
</div>

<script>
    // Toggles the sidebar (minimized/expanded)
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('minimized');
    }

    // Toggles the dark mode
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
    }

    // Toggles the dropdown menu for user options
    function toggleDropdownMenu() {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    }

    // Toggles the staff menu dropdown
    function toggleStaffMenu(event) {
        event.preventDefault();
        const staffMenu = event.target.closest('li').querySelector('.dropdown-content');
        staffMenu.style.display = staffMenu.style.display === 'block' ? 'none' : 'block';
    }

    // Initialize dark mode based on local storage
    document.addEventListener('DOMContentLoaded', () => {
        const isDarkMode = localStorage.getItem('dark-mode') === 'true';
        const body = document.body;
        const toggleButton = document.querySelector('.dark-mode-toggle i');

        if (isDarkMode) {
            body.classList.add('dark-mode');
            toggleButton.classList.remove('fa-moon');
            toggleButton.classList.add('fa-sun');
        }
    });
</script>
</body>
</html>
