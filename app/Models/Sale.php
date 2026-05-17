<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'total',
    ];

    public function details()
    {
        return $this->hasMany(
            SaleDetail::class
        );
    }
}