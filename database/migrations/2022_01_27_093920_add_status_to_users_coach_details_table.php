<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUsersCoachDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_coach_details', function (Blueprint $table) {
            $table->enum('status', array('P','V','S'))->nullable()->after('profile_status')->comment('P = Pending, V = Verify, S = Suspend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_coach_details', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
