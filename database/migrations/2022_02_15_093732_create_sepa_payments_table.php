<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepaPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('sepa_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();
            $table->double('amount')->nullable();
            $table->string('customer_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('fingerprint')->nullable();
            $table->string('last4')->nullable();
            $table->string('mandate')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('sepa_payments');
    }
}