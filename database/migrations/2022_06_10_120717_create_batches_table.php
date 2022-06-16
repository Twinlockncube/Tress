<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
          $table->string('id')->primary();
          $table->string('date');
          $table->string('reference_no')->nullable();
          $table->string('description');
          $table->string('currency');
          $table->decimal('act_amount',15,2);
          $table->decimal('act_total',15,2);
          $table->decimal('loc_amount',15,2);
          $table->decimal('loc_total',15,2);
          $table->string('sponsor_id');
          $table->integer('type'); //0 is debit 1 is credit
          $table->integer('entity_to_bill');
          $table->string('user_id');
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
        Schema::dropIfExists('batches');
    }
}
