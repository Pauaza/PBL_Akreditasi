<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_komentar', function (Blueprint $table) {
            $table->increments('id_komentar');
            $table->text('komentar');
            $table->unsignedInteger('id_user');

            $table->foreign('id_user')->references('id_user')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_komentar');
    }
};
