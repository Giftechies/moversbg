<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblScouponTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_scoupon', function (Blueprint $table) {
            $table->id();
            $table->text('c_img');
            $table->date('cdate');
            $table->text('c_desc')->charset('utf8')->collation('utf8_general_ci');
            $table->text('c_value');
            $table->text('c_title')->charset('utf8')->collation('utf8_general_ci');
            $table->integer('status')->default(1);
            $table->text('ctitle')->charset('utf8')->collation('utf8_general_ci');
            $table->integer('min_amt');
            $table->text('subtitle')->charset('utf8')->collation('utf8_general_ci');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_scoupon');
    }
}
