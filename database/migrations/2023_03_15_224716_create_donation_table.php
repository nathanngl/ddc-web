<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_category');
            $table->string('td_title');
            $table->string('td_receiver');
            $table->float('td_target');
            $table->dateTime('td_duration');
            $table->longText('td_description');
            $table->string('td_image');
            $table->float('td_collected_fund');
            $table->enum('td_status',['on_progress','completed']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation');
    }
};
