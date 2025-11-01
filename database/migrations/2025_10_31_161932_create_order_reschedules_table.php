<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_reschedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('uid');
            $table->dateTime('old_date')->nullable();
            $table->dateTime('new_date')->nullable();
            $table->string('reason')->nullable();
            $table->timestamps();  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_reschedules');
    }
};

