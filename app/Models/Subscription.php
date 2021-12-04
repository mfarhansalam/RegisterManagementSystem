<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'last_payment_id',
        'expire_at'
    ];

    protected $casts = [
        'expire_at' => 'datetime'
    ];

    public function getActiveAttribute() {
        return $this->expire_at->greaterThan(Carbon::now());
    }

    public function getDaysLeftAttribute() {
        if ($this->active) {   
            return $this->expire_at->diffInDays();
        }

        return 0;
    }

}
