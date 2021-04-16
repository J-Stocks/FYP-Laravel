<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayMonthliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_monthlies', function (Blueprint $table) {
            $table->id();
            $table->double('value');
            $table->integer('minimum_months');
            $table->double('cancellation_cost');
            $table->morphs('pay_monthlyable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_monthlies');
    }
}
