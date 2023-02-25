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
      Schema::create('guru_mata_pelajaran', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('guru_id');
        $table->unsignedBigInteger('mata_pelajaran_id');
        $table->foreign('guru_id')->references('id')->on('guru')->cascadeOnDelete();
        $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')->cascadeOnDelete();
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
        Schema::dropIfExists('guru_mata_pelajaran');
    }
};
