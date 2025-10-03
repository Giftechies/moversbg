<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSettingTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_setting', function (Blueprint $table) {
            $table->id();
            $table->text('webname')->charset('utf8')->collation('utf8_general_ci');
            $table->text('weblogo');
            $table->text('timezone');
            $table->text('currency')->charset('utf8')->collation('utf8_general_ci');
            $table->integer('pdboy');
            $table->text('one_key');
            $table->text('one_hash');
            $table->text('d_key');
            $table->text('d_hash');
            $table->integer('scredit');
            $table->integer('rcredit');
            $table->text('gkey');
            $table->integer('vehiid');
            $table->integer('couvid');
            $table->integer('kglimit');
            $table->float('kgprice');
            $table->text('semail');
            $table->text('smobile');
            $table->text('sms_type');
            $table->text('auth_key');
            $table->text('otp_id');
            $table->text('acc_id');
            $table->text('auth_token');
            $table->text('twilio_number');
            $table->text('otp_auth');
            $table->timestamps(); // Optional: adds created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_setting');
    }
}
