<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoachVerificationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coach_verification_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('qualified_fitness_coach', array('Y','N'))->nullable(false)->default('N')->comment('Y = Yes, N = No');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('qualification')->nullable();
            $table->string('country')->nullable();
            $table->enum('currently_insured', array('Y','N'))->nullable(false)->default('N')->comment('Y = Yes, N = No');
            $table->string('insured_with')->nullable();
            $table->string('insurance_type')->nullable();
            $table->string('insurance_expire_date')->nullable();
            $table->enum('agree_as_a_coach', array('A','D'))->nullable(false)->default('D')->comment('A = Agree, N = Not Agree');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_coach_verification_details');
    }
}
