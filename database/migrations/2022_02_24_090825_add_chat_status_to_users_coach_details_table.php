<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChatStatusToUsersCoachDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_coach_details', function (Blueprint $table) {
            $table->enum('chat_status', array('E','D'))->nullable()->after('profile_status')->comment('E = Enabled, D = Disabled');
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
            $table->dropColumn('chat_status');
        });
    }
}