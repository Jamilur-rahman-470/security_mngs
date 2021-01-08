<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainng', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('branch');
            $table->foreign('branch')->references('id')->on('train_branches')->onDelete('cascade');
            $table->unsignedBigInteger('reg_id');
            $table->foreign('reg_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trains');
    }
}
