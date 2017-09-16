<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('imgComments', function(Blueprint $imgComment){
            $imgComment->increments('id');
            $imgComment->string('content');
            $imgComment->integer('user_id')->unsigned()->index();
            $imgComment->integer('post_id')->unsigned()->index();
            $imgComment->timestamps();
            $imgComment->softDeletes();
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
    }
}
