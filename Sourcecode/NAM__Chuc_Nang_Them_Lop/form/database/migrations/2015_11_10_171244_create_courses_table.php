<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('courses', function (Blueprint $table) {
            $table->increments('ClassId');
            $table->string('TeacherId', 10)->unique();
            $table->string('Code', 10);
            $table->integer('allowChat');
            $table->integer('messageChildren');
            $table->integer('GradeLevel');
            $table->string('ClassName', 10);
            $table->string('ClassImage');
            $table->integer('allowFind');
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
