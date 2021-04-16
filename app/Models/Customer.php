<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function deals()
    {
        return $this->hasManyThrough(Deal::class, Policy::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }
}
