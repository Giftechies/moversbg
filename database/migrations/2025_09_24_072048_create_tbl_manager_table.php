<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblManagerTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_manager', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->tinyInteger('status');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id', 'fk_manager_zone_id')->references('id')->on('zones');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_manager');
    }
}
