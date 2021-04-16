<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electricity extends Model
{
    use HasFactory;

    protected $fillable = [
        'payable_id',
        'payable_type',
    ];

    public function deals()
    {
        return $this->morphMany(Deal::class, 'dealable');
    }

    public function coverageAreas()
    {
        return $this->morphMany(CoverageArea::class, 'coverable');
    }

    public function payable()
    {
        return $this->morphTo();
    }
}
