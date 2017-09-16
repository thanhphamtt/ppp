<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('imgPosts', function (Blueprint $imgPost) {
            $imgPost->increments('id');
            $imgPost->string('description');
            $imgPost->string('img_url');
            $imgPost->integer('user_id')->unsigned()->index();
            $imgPost->timestamps();
            $imgPost->softDeletes();
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
