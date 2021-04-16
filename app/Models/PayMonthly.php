<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMonthly extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'minimum_months',
        'cancellation_cost',
    ];

    public function electricity()
    {
        return $this->morphOne(Electricity::class, 'payable');
    }

    public function gas()
    {
        return $this->morphOne(Gas::class, 'payable');
    }

    public function internet()
    {
        return $this->morphOne(Internet::class, 'payable');
    }

    public function phone()
    {
        return $this->morphOne(Phone::class, 'payable');
    }

    public function tv()
    {
        return $this->morphOne(TV::class, 'payable');
    }

    public function water()
    {
        return $this->morphOne(Water::class, 'payable');
    }
}
