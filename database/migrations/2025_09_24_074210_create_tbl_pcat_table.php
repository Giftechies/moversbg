<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPcatTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_pcat', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->integer('status');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_pcat');
    }
}
