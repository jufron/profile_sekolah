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
      Schema::create('guru_jurusan', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('guru_id');
        $table->unsignedBigInteger('jurusan_id');
        $table->foreign('guru_id')->references('id')->on('guru')->cascadeOnDelete();
        $table->foreign('jurusan_id')->references('id')->on('jurusan')->cascadeOnDelete();
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
        Schema::dropIfExists('guru_jurusan');
    }
};
