<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllStatusFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('coach_badge_status', array('P','C','R'))->default('P')->after('hash_token')->comment('P = Pending, C = Certified, R = Reject');
            $table->enum('coach_profile_verification_status', array('P','V','R'))->after('hash_token')->default('P')->comment('P = Pending, V = Verify, R = Reject');
            $table->enum('status', array('A','S'))->default('A')->after('hash_token')->comment('A = Active, S = Suspend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('coach_badge_status');
            $table->dropColumn('coach_profile_verification_status');
            $table->dropColumn('status');
        });
    }
}
