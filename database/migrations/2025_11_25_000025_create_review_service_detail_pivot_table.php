<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewServiceDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('review_service_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('service_detail_id');
            $table->foreign('service_detail_id', 'service_detail_id_fk_10767761')->references('id')->on('service_details')->onDelete('cascade');
            $table->unsignedBigInteger('review_id');
            $table->foreign('review_id', 'review_id_fk_10767761')->references('id')->on('reviews')->onDelete('cascade');
        });
    }
}
