<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCoachEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_coach_education', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128)->nullable();
            $table->string('completion_year')->nullable();
            $table->text('institute')->nullable();
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
        Schema::dropIfExists('users_coach_education');
    }
}
