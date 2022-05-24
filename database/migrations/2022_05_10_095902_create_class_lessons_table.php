<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('class_group_id');
            $table->string('lesson_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('completed')->default(0); //0 is Not Done 1 is Done
            $table->string('evaluation')->nullable();
            $table->string('creator');
            $table->string('updater');
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
        Schema::dropIfExists('class_lessons');
    }
}
