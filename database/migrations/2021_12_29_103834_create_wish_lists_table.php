<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_lists', function (Blueprint $table) {
            $table->id();
            $table->enum('type', array('C','P'))->default(NULL)->comment('C = Coach, P = Program');
            $table->unsignedBigInteger('coach_id')->nullable(false);
            $table->foreign('coach_id')->references('id')->on('users');
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('user_coach_programs');
            $table->unsignedBigInteger('user_id')->nullable(false)->comment('added by');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', array('A','I'))->nullable()->comment('A = Active, I = Inactive');
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
        Schema::dropIfExists('wish_lists');
    }
}
