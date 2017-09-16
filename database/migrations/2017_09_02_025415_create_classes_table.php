<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courses_id')->unsigned()->index();
            $table->string('name');
            $table->string('study_time');
            $table->date('start_date');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('classes   ');
    }
}
