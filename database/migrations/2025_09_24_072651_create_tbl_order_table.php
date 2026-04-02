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
            $table->foreignId('uid')->constrained('users')->index(); 
            $table->integer('rid')->default(0);
            $table->foreignId('cat_id')->constrained('categories')->index(); 
            $table->integer('dzone');
            $table->integer('vehicleid');
            $table->text('pick_address')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('pick_lat');
            $table->text('pick_lng');
            $table->float('subtotal');
            $table->float('o_total');
            $table->integer('cou_id');
            $table->float('cou_amt');
            $table->text('trans_id');
            $table->enum('o_status', ['Pending', 'Processing', 'On Route', 'Completed', 'Cancelled'])->default('Pending');
            $table->float('dcommission')->default(0);
            $table->float('wall_amt');
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

