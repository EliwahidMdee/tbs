<?php
// Service.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['service_name','description', 'price'];

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_service');
    }
}
