<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPageTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_page', function (Blueprint $table) {
            $table->id();
            $table->text('title')->charset('utf8')->collation('utf8_general_ci');
            $table->integer('status');
            $table->text('description')->charset('utf8')->collation('utf8_general_ci');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_page');
    }
}
