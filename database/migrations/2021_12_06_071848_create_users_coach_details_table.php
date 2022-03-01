<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCoachDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_coach_details', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128)->nullable();
            $table->text('bio')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->enum('gender', array('M','F','O'))->nullable()->comment('M = Male, F = Female, O = Other');
            $table->string('city', 64)->nullable();
            $table->string('state', 64)->nullable();
            $table->string('country', 64)->nullable();
            $table->string('timezone')->nullable();
            $table->string('price_range', 128)->nullable();
            $table->string('image_file')->nullable();
            $table->string('categories')->nullable();
            $table->string('languages')->nullable();
            $table->string('personality_and_training')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->enum('profile_status', array('E','D'))->nullable()->comment('E = Enabled, D = Disabled');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_coach_details');
    }
}
