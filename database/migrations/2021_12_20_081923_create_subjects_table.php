<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('description');
            $table->integer('assessment_seq')->default(0);
            $table->timestamps();

            //$table->foreign('class_group_id')
            //  ->references('id')
            //  ->on('class_groups')
            //  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
