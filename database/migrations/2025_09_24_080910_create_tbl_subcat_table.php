<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubcatTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_subcat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained('categories')->index(); 
            $table->text('title');
            $table->integer('status');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_subcat');
    }
}
