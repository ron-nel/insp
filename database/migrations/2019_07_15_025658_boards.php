<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Boards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('collection_id')
            ->references('id')
            ->on('collections')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('profile_id')
            ->references('id')
            ->on('profiles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('boards');
    }
}
