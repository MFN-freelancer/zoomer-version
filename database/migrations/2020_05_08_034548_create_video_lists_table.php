<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_lists', function (Blueprint $table) {
            $table->id();
            $table->string('video_title');
            $table->longText('video_description')->nullable();
            $table->string('video_url');
            $table->string('video_cover');
            $table->string('video_category')->nullable();
            $table->string('video_view')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->integer('downloaded_number')->nullable();
            $table->date('downloaded_date')->nullable();
            $table->integer('ratings')->nullable();
            $table->string('video_approve');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('video_lists');
    }
}
