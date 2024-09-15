<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'hired_date', 'specialty'
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
