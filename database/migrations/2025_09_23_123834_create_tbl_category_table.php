<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_category', function (Blueprint $table) {
            $table->id(); // Laravel's id() is equivalent to int AUTO_INCREMENT PRIMARY KEY
            $table->text('cat_name');
            $table->integer('cat_status');
            $table->text('cat_img');
            $table->timestamps(); // Optional: adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_category');
    }
}