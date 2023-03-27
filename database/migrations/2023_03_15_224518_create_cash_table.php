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
        Schema::create('cash', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_donation');
            $table->string('tcs_source');
            $table->float('tcs_total');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('id_donation')->references('id')->on('donation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash');
    }
};
