<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img_path')->default("images/avatar-placeholder.png");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('professional_id')->nullable();
            $table->string('professional_title')->nullable();
            $table->string('description')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('location')->nullable();
            $table->string('request')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
