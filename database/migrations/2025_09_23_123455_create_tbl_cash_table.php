<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCashTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_cash', function (Blueprint $table) {
            $table->id();
            $table->integer('rid'); 
            $table->integer('amt');
            $table->text('message')->charset('utf8')->collation('utf8_general_ci');
            $table->dateTime('pdate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_cash');
    }
}

