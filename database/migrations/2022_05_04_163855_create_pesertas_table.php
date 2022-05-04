<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('lomba_id');
            $table->integer('urutan')->default(0);
            $table->string('nama');
            $table->integer('juri1')->default(1);
            $table->double('nilai1')->default(-1);
            $table->integer('juri2')->default(1);
            $table->double('nilai2')->default(-1);
            $table->integer('juri3')->default(1);
            $table->double('nilai3')->default(-1);
            $table->double('nilai')->default(-1);
            $table->integer('rangking')->default(-1);
            $table->integer('medali')->default(0);
            $table->boolean('aktif')->default(false);
            $table->integer('tahap')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
};
