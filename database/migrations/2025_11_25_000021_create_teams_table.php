<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('degination')->nullable();
            $table->longText('description')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('instagram')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
