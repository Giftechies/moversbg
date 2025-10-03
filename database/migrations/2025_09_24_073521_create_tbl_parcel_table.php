<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblParcelTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_parcel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid');
            $table->foreign('uid', 'fk_parcel_uid')->references('id')->on('tbl_user');
            $table->integer('rid')->default(0);
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id', 'fk_parcel_cat_id')->references('id')->on('tbl_category');
            $table->text('pickup_address');
            $table->text('pick_lat');
            $table->text('pick_long');
            $table->integer('pick_pincode');
            $table->text('drop_address');
            $table->text('drop_lat');
            $table->text('drop_long');
            $table->integer('drop_pincode');
            $table->date('order_date');
            $table->float('total');
            $table->text('transaction_id');
            $table->integer('p_method_id');
            $table->integer('dzone');
            $table->enum('status', ['Pending', 'Processing', 'On Route', 'Completed', 'Cancelled'])->default('Pending');
            $table->integer('dcommission')->default(0);
            $table->text('rlats')->nullable();
            $table->text('rlongs')->nullable();
            $table->dateTime('delivertime')->nullable();
            $table->integer('vehicleid');
            $table->text('parcel_weight');
            $table->text('parcel_dimension');
            $table->float('wall_amt')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_parcel');
    }
}