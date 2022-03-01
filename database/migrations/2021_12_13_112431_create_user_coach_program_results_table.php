<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoachProgramResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coach_program_results', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image_file')->nullable();
            $table->string('certificate')->nullable();
            $table->unsignedBigInteger('coach_program_id')->nullable(false);
            $table->foreign('coach_program_id')->references('id')->on('user_coach_programs');
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
        Schema::dropIfExists('user_coach_program_results');
    }
}
