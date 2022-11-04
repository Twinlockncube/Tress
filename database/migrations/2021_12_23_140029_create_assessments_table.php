<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('subject_id');
            $table->string('class_group_id');
            $table->string('user_id');
            $table->string('category');
            $table->integer('total');
            $table->double('weight')->nullable();
            $table->string('parent_id')->nullable();
            $table->date('date');
            $table->timestamps();

          /*  $table->foreign('subject_id')
              ->references('id')
              ->on('subjects')
              ->onDelete('cascade');
            $table->foreign('class_group_id')
              ->references('id')
              ->on('class_groups')
              ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
