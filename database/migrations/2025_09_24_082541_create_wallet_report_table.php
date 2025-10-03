<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletReportTable extends Migration
{
    public function up()
    {
        Schema::create('wallet_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid');
            $table->foreign('uid', 'fk_wallet_report_uid')->references('id')->on('tbl_user');
            $table->string('message');
            $table->string('status');
            $table->decimal('amt', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wallet_report');
    }
}
