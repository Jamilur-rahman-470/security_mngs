<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerticipatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perticipators', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('reg_id');
            $table->foreign('reg_id')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('serial_no');
            $table->float('app_fee')->default(0);
            $table->string('branch');
            $table->string('education');
            $table->string('previous_job');
            $table->string('physical_qual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perticipators');
    }
}
