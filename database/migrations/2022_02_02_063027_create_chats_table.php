<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->unsignedBigInteger('receiver_id')->nullable();
            $table->text('message')->nullable();
            $table->string('media')->nullable();
            $table->string('thumbnail')->nullable();
            $table->enum('type', array('I','D','V','T'))->default('T')->comment('I = Image, D = Document, V = Video, T = Text');
            $table->string('is_read')->default('N')->comment('N = receiver not read yet, Y = receiver read');
            $table->string('is_deleted')->default('N')->comment('N = not deleted, Y = sender and receiver both deleted, any other number = id of the user who has deleted this chat');

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
        Schema::dropIfExists('chats');
    }
}
