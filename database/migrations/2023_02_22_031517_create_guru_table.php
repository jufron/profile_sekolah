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
      Schema::create('guru', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('nama_lengkap', 100);
        $table->string('gelar_depan', 15)->nullable();
        $table->string('gelar_belakang', 20);
        $table->string('status', 20);
        $table->string('nip', 15)->nullable();
        $table->string('jenis_kelamin', 10);
        $table->string('alamat', 100);
        $table->string('tempat_lahir', 50);
        $table->timestamp('tanggal_lahir');
        $table->string('suku', 40);
        $table->string('agama', 40);
        $table->string('nomor_telepon', 13);
        $table->string('avatar')->nullable();

        $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('guru');
    }
};
