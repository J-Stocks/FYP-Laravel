<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class PayMonthly extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'minimum_months',
        'cancellation_cost',
    ];
}
