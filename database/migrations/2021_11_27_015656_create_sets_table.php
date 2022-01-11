<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetsTable extends Migration
{
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('weight')->nullable();
            $table->integer('repetitions')->nullable();
            $table->integer('duration')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sets');
    }
}
