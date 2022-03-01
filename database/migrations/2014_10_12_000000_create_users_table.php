<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role_type', array('U','C','A'))->nullable(false)->comment('A = Admin, U = User, C = Coach');
            $table->enum('user_type', array('P','B'))->nullable()->comment('P = Personal, B = Business');
            $table->string('contact_no', 64)->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('address', 128)->nullable();
            $table->string('address_lat', 128)->nullable();
            $table->string('address_long', 128)->nullable();
            $table->string('postal_code', 32)->nullable();
            $table->string('profile_image')->nullable();
            $table->enum('status', array('P','V','C','S'))->nullable()->comment('P = Pending, V = Verified, C = Certified, S = Suspend');
            $table->string('instagram_url')->nullable();
            $table->string('agree_terms', 16)->nullable();
            $table->tinyInteger('account_complete')->default('0');
            $table->enum('is_verification', array('V','N'))->nullable()->comment('V = Verified, N = Not Verified');
            $table->string('hash_token')->nullable();
            //$table->foreign('state_id')->references('id')->on('state');
            //$table->foreign('country_id')->references('id')->on('country');
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
        Schema::dropIfExists('users');
    }
}
