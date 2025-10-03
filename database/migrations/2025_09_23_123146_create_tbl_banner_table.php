<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('tbl_banner', function (Blueprint $table) {
            $table->id(); // Laravel's id() is auto-incrementing unsignedBigInteger
            $table->text('img');
            $table->integer('status');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_banner');
    }
};
