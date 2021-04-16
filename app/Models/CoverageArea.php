<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageArea extends Model
{
    use HasFactory;

    public function electricities()
    {
        return $this->morphedByMany(Electricity::class, 'coverable');
    }

    public function gases()
    {
        return $this->morphedByMany(Gas::class, 'coverable');
    }

    public function internets()
    {
        return $this->morphedByMany(Internet::class, 'coverable');
    }

    public function phones()
    {
        return $this->morphedByMany(Phone::class, 'coverable');
    }

    public function tvs()
    {
        return $this->morphedByMany(TV::class, 'coverable');
    }

    public function waters()
    {
        return $this->morphedByMany(Water::class, 'coverable');
    }
}
