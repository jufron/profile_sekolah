<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
      Schema::create('jurnal_kelas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('tanggal', 20);
        $table->unsignedBigInteger('mata_pelajaran_id');
        $table->string('kelas', 3);
        $table->unsignedBigInteger('jurusan_id');
        $table->string('jam_ke', 4);
        $table->text('materi_pokok');
        $table->string('sakit', 2);
        $table->string('ijin', 2);
        $table->string('alpha', 2);
        $table->boolean('arship_status');

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran');
        $table->foreign('jurusan_id')->references('id')->on('jurusan');
        $table->timestamps();
      });
    }

    public function down()
    {
        Schema::dropIfExists('jurnal_kelas');
    }
};
