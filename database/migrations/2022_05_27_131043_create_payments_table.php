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
            $table->date('date');
            $table->string('reference_no');
            $table->string('description');
            $table->string('currency');
            $table->decimal('rat_value',15,6);
            $table->decimal('act_amount',15,2);
            $table->decimal('loc_amount',15,2);
            $table->decimal('loc_balance',15,2);
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
