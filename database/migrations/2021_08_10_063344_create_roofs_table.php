<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoofsTable extends Migration
{
    public function up()
    {
        Schema::create('roofs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('score');
            $table->longText('gallery')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roofs');
    }
}
