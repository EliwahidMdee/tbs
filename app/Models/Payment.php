<?php
// Payment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['visit_id', 'total_amount', 'payment_date', 'payment_method'];

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'payment_service');
    }
}
