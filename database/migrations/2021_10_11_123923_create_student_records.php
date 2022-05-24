<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('last_name');
            $table->string('name');
            $table->string('address');
            $table->date('dob');
            $table->integer('gender');
            $table->string('email')->unique();
            $table->string('nid');
            $table->string('sponsor_id');
            $table->string('guardian_id')->nullable();
            $table->integer('reg_flg'); //registered 1 transferred 2 completed 3
            $table->string('class_group_id');
            $table->timestamps();

            $table->foreign('guardian_id')
              ->references('id')
              ->on('guardians')
              ->onDelete('cascade');
            $table->foreign('classgroup_id')
                ->references('id')
                ->on('classgroups')
                ->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_records');
    }
}
