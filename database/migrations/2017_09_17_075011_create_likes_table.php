<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('postLikes', function(Blueprint $postLike) {
            $postLike->increments('id');
            $postLike->integer('user_id')->unsigned()->index();
            $postLike->integer('post_id')->unsigned()->index();
            $postLike->timestamps();
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
