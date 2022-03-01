<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoachProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coach_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('program_name', 128)->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->double('price',8,2)->nullable(false);
            $table->string('stock')->nullable()->comment('I = InStock,O = OutOfStock');
            $table->string('tax_class')->nullable();
            $table->string('categories')->nullable();
            $table->string('image_file')->nullable();
            $table->integer('program_star')->nullable();
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
        Schema::dropIfExists('user_coach_programs');
    }
}
