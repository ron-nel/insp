<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Journals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profile_id');
            $table->text('message');
            $table->unsignedBigInteger('status_id');
            $table->text('recommendation');
            $table->foreign('profile_id')
            ->references('id')
            ->on('profiles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
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
        Schema::dropIfExists('journals');
    }
}
