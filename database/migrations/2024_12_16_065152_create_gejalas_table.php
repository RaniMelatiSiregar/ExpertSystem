<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalasTable extends Migration
{
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala')->unique();
            $table->string('nama_gejala');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gejalas');
    }
}
