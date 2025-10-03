<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLogisticsProductTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_logistics_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oid');
            $table->foreign('oid', 'fk_logistics_product_oid')->references('id')->on('tbl_logistics');
            $table->text('product_name');
            $table->integer('quantity');
            $table->float('price');
            $table->float('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_logistics_product');
    }
}

