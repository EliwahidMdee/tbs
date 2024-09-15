<?php
// Receptionist model
// File: `app/Models/Receptionist.php`
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'hired_date'];
}
