<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUserCoachVerificationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_coach_verification_details', function (Blueprint $table) {
            $table->enum('badge_status', array('P','C','S'))->nullable()->after('agree_as_a_coach')->comment('P = Pending, C = Certified, S = Suspend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_coach_verification_details', function (Blueprint $table) {
             $table->dropColumn('badge_status');
        });
    }
}
