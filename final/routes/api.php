<?php
use App\Models;
use App\Models\AdherenceMonitoring;
use App\Models\Analytic;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\EPrescription;
use App\Models\Facility;
use App\Models\HealthRecord;
use App\Models\MedicationDispensation;
use App\Models\MedicationReminder;
use App\Models\Message;
use App\Models\PatientEducatation;
use App\Models\Prescription;
use App\Models\PrescriptionVerification;
use App\Models\Report;
use App\Models\Specialty;
use App\Models\Support;
use App\Models\Symptom;
use App\Models\SystemConfig;
use App\Models\Task;  


use App\Http\Controller; 
use App\Http\Controllers\AdherenceMonitoringController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\EPrescriptionController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\MedicationDispensationController;
use App\Http\Controllers\MedicationReminderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientEducationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionVerificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\SystemConfigController;
use App\Http\Controllers\TaskController;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
Route::resource('adherence_monitoring', AdherenceMonitoringController::class);

// Analytic Routes
Route::resource('analytics', AnalyticController::class);

// Appointment Routes
Route::resource('appointments', AppointmentController::class);

// Consultation Routes
Route::resource('consultations', ConsultationController::class);

// E-Prescription Routes
Route::resource('eprescriptions', EPrescriptionController::class);

// Facility Routes
Route::resource('facilities', FacilityController::class);

// Health Record Routes
Route::resource('health_records', HealthRecordController::class);

// Medication Dispensation Routes
Route::resource('medication_dispensations', MedicationDispensationController::class);

// Medication Reminder Routes
Route::resource('medication_reminders', MedicationReminderController::class);

// Message Routes
Route::resource('messages', MessageController::class);

// Patient Education Routes
Route::resource('patient_education', PatientEducationController::class);

// Prescription Routes
Route::resource('prescriptions', PrescriptionController::class);

// Prescription Verification Routes
Route::resource('prescription_verifications', PrescriptionVerificationController::class);

// Report Routes
Route::resource('reports', ReportController::class);

// Specialty Routes
Route::resource('specialties', SpecialtyController::class);

// Support Routes
Route::resource('support', SupportController::class);

// Symptom Routes
Route::resource('symptoms', SymptomController::class);

// System Config Routes
Route::resource('system_config', SystemConfigController::class);

// Task Routes
Route::resource('tasks', TaskController::class);

use App\Models\User; // Import the User model

// Retrieve all users
Route::get('/users', function () {
    $users = User::all();
    return response()->json(['data' => $users]); // Return JSON response with data key
});

// Create sample users
Route::post('/users', function () {
    // Define sample user data
    $sampleUsers = [
        [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'user_type' => 'admin',
        ],
        [
            'name' => 'Doctor',
            'email' => 'doctor@example.com',
            'password' => bcrypt('doctor123'),
            'user_type' => 'doctor',
        ],
        [
            'name' => 'Nurse',
            'email' => 'nurse@example.com',
            'password' => bcrypt('nurse123'),
            'user_type' => 'nurse',
        ],
        [
            'name' => 'Patient',
            'email' => 'patient@example.com',
            'password' => bcrypt('patient123'),
            'user_type' => 'patient',
        ],
        [
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'password' => bcrypt('staff123'),
            'user_type' => 'staff',
        ],
    ];

    // Create each user in the database
    foreach ($sampleUsers as $userData) {
        User::create($userData);
    }

    return response()->json(['message' => 'Sample users created successfully']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
