<?php
// app/Models/LabTest.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    protected $fillable = [
        'test_name', 'test_price'
    ];

    // Define relationships if needed
    // public function labTechnician()
    // {
    //     return $this->belongsTo(LabTechnician::class);
    // }
}
