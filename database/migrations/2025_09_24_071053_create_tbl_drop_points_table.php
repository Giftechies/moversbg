<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDropPointsTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_drop_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id', 'fk_drop_points_order_id')->references('id')->on('tbl_order');
            $table->unsignedBigInteger('uid');
            $table->foreign('uid', 'fk_drop_points_uid')->references('id')->on('tbl_user');
            $table->text('drop_address')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->text('drop_lat');
            $table->text('drop_lng');
            $table->text('drop_name');
            $table->text('drop_mobile');
            $table->text('status');
            $table->text('photos')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_drop_points');
    }
}

