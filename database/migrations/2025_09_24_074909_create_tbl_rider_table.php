<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRiderTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_rider', function (Blueprint $table) {
            $table->id();
            $table->text('title')->charset('utf8')->collation('utf8_general_ci');
            $table->text('rimg');
            $table->integer('status');
            $table->float('rate');
            $table->text('lcode')->nullable();
            $table->text('full_address')->charset('utf8')->collation('utf8_general_ci');
            $table->text('pincode');
            $table->text('landmark')->charset('utf8')->collation('utf8_general_ci');
            $table->float('commission');
            $table->text('bank_name');
            $table->text('ifsc');
            $table->text('receipt_name')->charset('utf8')->collation('utf8_general_ci');
            $table->text('acc_number');
            $table->text('paypal_id');
            $table->text('upi_id');
            $table->text('email');
            $table->text('password');
            $table->integer('rstatus')->default(1);
            $table->text('mobile');
            $table->integer('accept')->default(0);
            $table->integer('reject')->default(0);
            $table->integer('complete')->default(0);
            $table->integer('dzone');
            $table->integer('vehiid');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_rider');
    }
}
