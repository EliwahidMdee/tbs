<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone_number',
        'address',
        'email',
        'marital_status',
        'nationality',
        'occupation',
        'drug_allergies',
        'food_allergies',
        'doctor_id',

    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function symptoms()
    {
        return $this->hasMany(Symptom::class);
    }
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class);
    }
}
