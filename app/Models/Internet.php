<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internet extends Model
{
    use HasFactory;

    public function deals()
    {
        return $this->morphMany(Deal::class, 'dealable');
    }

    public function coverageAreas()
    {
        return $this->morphMany(CoverageArea::class, 'coverable');
    }

    public function payAsYouGo()
    {
        return $this->morphOne(PayAsYouGo::class, 'pay_as_you_goable');
    }

    public function payMonthly()
    {
        return $this->morphOne(PayMonthly::class, 'pay_monthlyable');
    }
}
