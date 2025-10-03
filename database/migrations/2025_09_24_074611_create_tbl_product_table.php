<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id', 'fk_product_cat_id')->references('id')->on('tbl_category');
            $table->unsignedBigInteger('subcat_id');
            $table->foreign('subcat_id', 'fk_product_subcat_id')->references('id')->on('tbl_subcat');
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}