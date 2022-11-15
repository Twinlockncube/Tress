<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->string('subject_id');
        $table->date('date');
        $table->string('student_id');
        $table->string('user_id');
        $table->integer('punctual'); //1 is punctual 0 is late
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
        Schema::dropIfExists('attendances');
    }
}
