<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    public function electricities()
    {
        return $this->embedsOne(Electricity::class);
    }

    public function gases()
    {
        return $this->embedsOne(Gas::class);
    }

    public function internets()
    {
        return $this->embedsOne(Internet::class);
    }

    public function embedsOne()
    {
        return $this->embedsOne(Phone::class);
    }

    public function tvs()
    {
        return $this->embedsOne(TV::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function waters()
    {
        return $this->embedsOne(Water::class);
    }
}
