<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->text('title')->charset('utf8')->collation('utf8_general_ci');
            $table->integer('status');
            $table->polygon('coordinates');
            $table->text('alias');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('zones');
    }
}

