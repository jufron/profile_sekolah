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
        Schema::create('social_media_link', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('social_media_id');
            $table->foreign('social_media_id')
                  ->references('id')
                  ->on('social_media')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('link');
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
        Schema::dropIfExists('social_media_link');
    }
};
