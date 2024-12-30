<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyakitsTable extends Migration
{
    public function up()
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit', 10)->unique();
            $table->string('nama_penyakit', 255);
            $table->text('definisi');
            $table->text('solusi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyakits');
    }
}
