<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPaymentListTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_payment_list', function (Blueprint $table) {
            $table->id();
            $table->text('title')->charset('utf8')->collation('utf8_general_ci');
            $table->text('img');
            $table->text('attributes');
            $table->integer('status')->default(1);
            $table->text('subtitle')->nullable();
            $table->integer('p_show');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_payment_list');
    }
}
