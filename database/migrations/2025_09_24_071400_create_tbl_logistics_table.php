<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLogisticsTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_logistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uid')->constrained('tbl_user')->index(); // Assuming uid references users table
            $table->integer('rid')->default(0);
            $table->text('pickup_address');
            $table->text('pick_lat');
            $table->text('pick_long');
            $table->text('drop_address');
            $table->text('drop_lat');
            $table->text('drop_long');
            $table->integer('pick_has_lift');
            $table->integer('drop_has_lift');
            $table->integer('pick_floor_no');
            $table->integer('drop_floor_no');
            $table->date('logistic_date');
            $table->float('total');
            $table->text('transaction_id');
            $table->integer('p_method_id');
            $table->integer('dzone');
            $table->enum('status', ['Pending', 'Processing', 'On Route', 'Completed', 'Cancelled'])->default('Pending');
            $table->integer('dcommission')->default(0);
            $table->text('rlats')->nullable();
            $table->text('rlongs')->nullable();
            $table->dateTime('delivertime')->nullable();
            $table->integer('vehicleid')->default(0);
            $table->float('wall_amt')->default(0);
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_logistics');
    }
}
