<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LabTechnicianController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LabTestController;

Route::middleware(['auth'])->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('password/change', [ResetPasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('password/change', [ResetPasswordController::class, 'changePassword'])->name('password.update');

Route::post('patients/{patient}/assign-doctor', [DoctorController::class, 'assignDoctor']);
Route::post('patients/{patient}/update-symptoms', [DoctorController::class, 'updateSymptoms']);

Route::post('patients/{patient}/assign-tests', [LabTechnicianController::class, 'assignTests']);
Route::post('patients/{patient}/update-results', [LabTechnicianController::class, 'updateResults']);

Route::post('patients/{patient}/assign-prescription', [PharmacistController::class, 'assignPrescription']);

Route::post('patients/{patient}/generate-bill', [CashierController::class, 'generateBill']);
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');

Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('patients/{patient}', [PatientController::class, 'show'])->name('patients.show');

Route::post('prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');
Route::get('prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');

Route::get('doctor/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
Route::post('doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index');

Route::get('labtechnician', [LabTechnicianController::class, 'index'])->name('labtechnicians.index');
Route::get('labtests', [LabTestController::class, 'index'])->name('labtests.index');
Route::get('pharmacists', [PharmacistController::class, 'index'])->name('pharmacists.index');

Route::get('cashiers', [CashierController::class, 'index'])->name('cashiers.index');

Route::get('services', [ServiceController::class, 'index'])->name('services.index');

    Route::post('/patients/{patient}/prescriptions/assign', [PatientController::class, 'assignPrescription'])->name('patient.prescriptions.assign');
    Route::post('/patients/{patient}/symptoms', [PatientController::class, 'storeSymptom'])->name('patient.symptoms.store');
Route::get('/receptionist/assign/{patient}', [ReceptionistController::class, 'showAssignForm'])->name('receptionist.assign');
Route::post('/receptionist/assign/{patient}', [ReceptionistController::class, 'assignDoctor'])->name('receptionist.assignDoctor');
Route::get('receptionist', [ReceptionistController::class, 'index'])->name('receptionists.index');
Route::get('receptionist/{receptionist}', [ReceptionistController::class, 'show'])->name('receptionists.show');
Route::post('receptionist', [ReceptionistController::class, 'store'])->name('receptionists.store');

Route::get('labtechnician/{labtechnician}', [LabTechnicianController::class, 'show'])->name('labtechnicians.show');
Route::post('labtechnician', [LabTechnicianController::class, 'store'])->name('labtechnicians.store');

Route::get('pharmacist/{pharmacist}', [PharmacistController::class, 'show'])->name('pharmacists.show');
Route::post('pharmacist', [PharmacistController::class, 'store'])->name('pharmacists.store');

Route::get('cashier/{cashier}', [CashierController::class, 'show'])->name('cashiers.show');
Route::post('cashier', [CashierController::class, 'store'])->name('cashiers.store');

Route::post('labtests', [LabTestController::class, 'store'])->name('labtests.store');
Route::post('services', [ServiceController::class, 'store'])->name('services.store');
});

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
// Public routes
Route::get('/', function () {
return view('Loading.index');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Auth::routes();
