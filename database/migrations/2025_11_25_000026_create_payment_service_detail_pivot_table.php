<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentServiceDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('payment_service_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('service_detail_id');
            $table->foreign('service_detail_id', 'service_detail_id_fk_10767762')->references('id')->on('service_details')->onDelete('cascade');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_10767762')->references('id')->on('payments')->onDelete('cascade');
        });
    }
}
