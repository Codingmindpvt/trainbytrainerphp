<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommissionTypeToAdminCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_commissions', function (Blueprint $table) {
            //
            $table->enum('commission_type', array('P','C'))->nullable(false)->comment('P = Programs,C=CLASS');

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
            //
        });
    }
}
