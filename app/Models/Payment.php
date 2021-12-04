<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_gateway',
        'order_number',
        'amount',
        'transaction_data',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];    

    public function user() {
        return $this->belongsTo( User::class );
    }

}
