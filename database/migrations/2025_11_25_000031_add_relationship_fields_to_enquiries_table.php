<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('service_type_id')->nullable();
            $table->foreign('service_type_id', 'service_type_fk_10767768')->references('id')->on('service_types');
        });
    }
}
