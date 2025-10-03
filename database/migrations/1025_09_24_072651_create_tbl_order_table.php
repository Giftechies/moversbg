<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrderTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uid');
            $table->foreign('uid', 'fk_order_uid')->references('id')->on('tbl_user');
            $table->integer('rid')->default(0);
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id', 'fk_order_cat_id')->references('id')->on('tbl_category');
            $table->integer('dzone');
            $table->integer('vehicleid');
            $table->text('pick_address')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('pick_lat');
            $table->text('pick_lng');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('o_total', 10, 2);
            $table->integer('cou_id');
            $table->decimal('cou_amt', 10, 2);
            $table->text('trans_id');
            $table->enum('o_status', ['Pending', 'Processing', 'On Route', 'Completed', 'Cancelled'])->default('Pending');
            $table->decimal('dcommission', 10, 2)->default(0);
            $table->decimal('wall_amt', 10, 2);
            $table->integer('p_method_id');
            $table->dateTime('odate');
            $table->text('rlats')->nullable();
            $table->text('rlongs')->nullable();
            $table->dateTime('delivertime')->nullable();
            $table->text('pick_name');
            $table->text('pick_mobile');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_order');
    }
}



