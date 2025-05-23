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
        Schema::create('t_pelaksanaan', function (Blueprint $table) {
            $table->increments('id_pelaksanaan');
            $table->text('penetapan');
            $table->string('pendukung', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->unsignedInteger('id_kriteria');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('t_kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pelaksanaan');
    }
};
