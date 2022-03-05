<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToAdminCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_commissions', function (Blueprint $table) {
            $table->enum('type', array('C','P'))->default(NULL)->comment('C = Class, P = Program');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_commissions', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}