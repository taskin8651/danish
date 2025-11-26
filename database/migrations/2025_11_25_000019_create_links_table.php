<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('facebook')->nullable();
            $table->longText('instragram')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('linkedin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
