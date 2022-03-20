<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChatStatusChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->enum('chat_status', array('0','1'))->default('0')->after('type')->comment('1 = clear , 0 = notClear ');
            $table->integer('clear_by_sender')->nullable()->after('type');
            $table->integer('clear_by_receiver')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->dropColumn('chat_status');
            $table->dropColumn('clear_by_sender');
            $table->dropColumn('clear_by_receiver');
        });
    }
}
