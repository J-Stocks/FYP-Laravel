<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayAsYouGo extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_rate',
        'unit_rate',
        'unit',
    ];

    public function payAsYouGoable()
    {
        return $this->morphTo();
    }
}
