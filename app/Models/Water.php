<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    public function coverageAreas()
    {
        return $this->embedsMany(CoverageArea::class);
    }

    public function payAsYouGo()
    {
        return $this->embedsOne(PayAsYouGo::class);
    }

    public function payMonthly()
    {
        return $this->embedsOne(PayMonthly::class);
    }
}
