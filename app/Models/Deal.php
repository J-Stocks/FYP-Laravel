<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->hasManyThrough(Customer::class, Policy::class);
    }

    public function electricities()
    {
        return $this->morphedByMany(Electricity::class, 'dealable');
    }

    public function gases()
    {
        return $this->morphedByMany(Gas::class, 'dealable');
    }

    public function internets()
    {
        return $this->morphedByMany(Internet::class, 'dealable');
    }

    public function phones()
    {
        return $this->morphedByMany(Phone::class, 'dealable');
    }

    public function tvs()
    {
        return $this->morphedByMany(TV::class, 'dealable');
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function waters()
    {
        return $this->morphedByMany(Water::class, 'dealable');
    }
}
