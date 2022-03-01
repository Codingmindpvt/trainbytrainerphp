<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('star')->nullable(false);
            $table->unsignedBigInteger('rated_by')->nullable(false)->comment('added by');
            $table->foreign('rated_by')->references('id')->on('users');
            $table->integer('rate_for')->nullable(false)->comment('coach id | program id');
            $table->integer('rate_for_coach_id')->nullable();
            $table->integer('rate_for_program_id')->nullable();
            $table->enum('review_type', array('C','P'))->nullable(false)->comment('C = Coaches, P = Programs');
            $table->enum('status', array('A','D'))->nullable()->comment('A = Active, D = Deactive');
            $table->Date('trained_date')->nullable();
            $table->text('reason')->nullable()->comment('for coach only');
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
        Schema::dropIfExists('reviews');
    }
}
