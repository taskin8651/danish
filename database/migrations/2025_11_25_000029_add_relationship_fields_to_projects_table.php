<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('service_type_id')->nullable();
            $table->foreign('service_type_id', 'service_type_fk_10767739')->references('id')->on('service_types');
        });
    }
}
