<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeOfPriceToCoachClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coach_classes', function (Blueprint $table) {
           
            DB::statement('alter table coach_classes modify price DOUBLE(8,2) DEFAULT 0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coach_classes', function (Blueprint $table) {
            $table->integer('price')->nullable();
        });
    }
}
