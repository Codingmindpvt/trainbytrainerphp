<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToWishListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            $table->enum('type', array('C','P','CL'))->default(NULL)->after('id')->comment('C = Coach, P = Program, CL = Class');
            $table->unsignedBigInteger('class_id')->after('program_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wish_lists', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('class_id');
        });
    }
}