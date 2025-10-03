<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVehicleTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_vehicle', function (Blueprint $table) {
            $table->id();
            $table->text('title')->charset('utf8')->collation('utf8_general_ci');
            $table->text('img');
            $table->integer('status');
            $table->text('description')->charset('utf8')->collation('utf8_general_ci');
            $table->integer('ukms');
            $table->integer('uprice');
            $table->integer('aprice');
            $table->text('capcity');
            $table->text('size');
            $table->integer('ttime');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_vehicle');
    }
}