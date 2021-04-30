<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Deal;
use App\Models\Electricity;
use App\Models\Gas;
use App\Models\Supplier;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use WithFaker;

    const TEST_ITERATIONS = 100;

    public function test_simple_read()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            Deal::all();
            return DB::getQueryLog()[$iteration];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested simple read of Deal object '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_simple_create()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            $newSupplier = Supplier::factory()->make();
            $newSupplier->save();
            $newSupplier->delete();
            return DB::getQueryLog()[$iteration * 2];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested simple creation of Supplier object '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_simple_update()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            $customer = Customer::inRandomOrder()->first();
            $oldName = $customer->name;
            $customer->update(['name' => $this->faker->name]);
            $customer->update(['name' => $oldName]);
            return DB::getQueryLog()[2 * $iteration];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested simple update of Customer object '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_simple_delete()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            $newCustomer = Customer::factory()->make();
            $newCustomer->save();
            $newCustomer->delete();
            return DB::getQueryLog()[(2 * $iteration) + 1];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested simple delete of Customer object '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_complex_read()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            Deal::has('electricities')->get();
            return DB::getQueryLog()[$iteration];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested read of all deals that include electricity '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_complex_create()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            $newElectricity = Electricity::factory()->make();
            $newElectricity->save();
            $newElectricity->delete();
            return DB::getQueryLog()[(4 * $iteration) + 1];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested creation of the payment record associated with a new Electricity object '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_complex_update()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            DB::table('pay_monthlies')->increment('value', 3);
            return DB::getQueryLog()[$iteration];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested complex update of a PayMonthly object '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    public function test_complex_delete()
    {
        $this->setupDbTest();
        $query = function ($iteration) {
            $deal = Deal::whereHas('gases')->inRandomOrder()->first();
            $deal->gases()->detach();
            $gas = Gas::inRandomOrder()->first();
            $deal->gases()->attach($gas);
            return DB::getQueryLog()[(4 * $iteration) + 1];
        };
        $results = $this->iterateQuery($query);
        $this->dbLog('Tested deletion of the relationship between a Deal and Gas '.static::TEST_ITERATIONS.' times.');
        $this->printStats($results);
    }

    protected function dbLog($message)
    {
        Log::channel('dbtest')->info($message);
    }

    protected function iterateQuery($query): array
    {
        $times = [];
        for ($i = 0; $i < static::TEST_ITERATIONS; $i++) {
            $times[] = $query($i)['time'];
        }
        $queryString = $query(static::TEST_ITERATIONS)['query'];
        return compact('queryString', 'times');
    }

    protected function printStats($results)
    {
        $this->dbLog('Query used: '.$results['queryString']);
        $this->dbLog('Average time: '.(array_sum($results['times'])/static::TEST_ITERATIONS));
        $this->dbLog('Min time: '.min($results['times']));
        $this->dbLog('Max time: '.max($results['times']));
    }

    protected function setupDbTest()
    {
        $this->expectNotToPerformAssertions();
        DB::enableQueryLog();
        $this->setupFaker();
    }
}
