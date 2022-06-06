<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_no');
            $table->date('date');
            $table->string('reference_no')->nullable();
            $table->string('description');
            $table->string('currency');
            $table->decimal('act_amount',15,2)->nullable();
            $table->decimal('loc_amount',15,2);
            $table->decimal('loc_balance',15,2);
            $table->integer('type'); //0 is debit 1 is credit
            $table->string('sponsor_id');
            $table->string('student_id');
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
        Schema::dropIfExists('payments');
    }
}
