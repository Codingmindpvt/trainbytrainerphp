<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCoachImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_coach_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_file')->nullable();
            $table->unsignedBigInteger('coach_detail_id')->nullable(false);
            $table->foreign('coach_detail_id')->references('id')->on('users_coach_details');
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
        Schema::dropIfExists('users_coach_images');
    }
}
