<?php
// app/Models/LabTechnician.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTechnician extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'hired_date'
    ];

    // Define relationships if needed
    // public function labTests()
    // {
    //     return $this->hasMany(LabTest::class);
    // }
}
