<?php
// File: `app/Models/Home.php`

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'owner',
    ];

    // Define any relationships if necessary
    // For example, if a Home has many Rooms:
    // public function rooms()
    // {
    //     return $this->hasMany(Room::class);
    // }
}
