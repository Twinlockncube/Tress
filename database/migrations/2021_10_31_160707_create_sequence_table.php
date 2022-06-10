<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSequenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sequences', function (Blueprint $table) {
            $table->id();
            $table->integer('student_seq')->default('0');
            $table->integer('payment_seq')->default('0');
            $table->integer('payment_batch_seq')->default('0');
            $table->integer('guardian_seq')->default('0');
            $table->integer('sponsor_seq')->default('0');
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
        Schema::dropIfExists('sequence');
    }
}
