<?php
// app/Models/Pharmacist.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacist extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hired_date',
    ];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
