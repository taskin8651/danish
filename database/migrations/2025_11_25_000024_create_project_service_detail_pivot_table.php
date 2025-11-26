<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectServiceDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_service_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('service_detail_id');
            $table->foreign('service_detail_id', 'service_detail_id_fk_10767760')->references('id')->on('service_details')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_10767760')->references('id')->on('projects')->onDelete('cascade');
        });
    }
}
