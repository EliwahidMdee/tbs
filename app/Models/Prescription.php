<?php
// app/Models/Prescription.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescription';

    protected $fillable = [
        'medication_name',
        'dosage',
        'price',
        'pharmacist_id',
    ];

    public function pharmacist()
    {
        return $this->belongsTo(Pharmacist::class);
    }
}
