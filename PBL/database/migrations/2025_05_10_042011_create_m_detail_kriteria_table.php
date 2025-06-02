<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_detail_kriteria', function (Blueprint $table) {
            $table->increments('id_detail_kriteria');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_penetapan');
            $table->unsignedInteger('id_pelaksanaan');
            $table->unsignedInteger('id_evaluasi');
            $table->unsignedInteger('id_pengendalian');
            $table->unsignedInteger('id_peningkatan');
            $table->unsignedInteger('id_kriteria');
            $table->unsignedInteger('id_komentar')->nullable();

            $table->enum('status_kps', ['acc', 'rev'])->nullable();
            $table->enum('status_kajur', ['acc', 'rev'])->nullable();
            $table->enum('status_kjm', ['acc', 'rev'])->nullable();
            $table->enum('status_direktur', ['acc', 'rev'])->nullable();

            $table->enum('status_selesai', ['save', 'submit'])->default('save');

            // Foreign Key Constraints
            $table->foreign('id_user')->references('id_user')->on('m_user');
            $table->foreign('id_penetapan')->references('id_penetapan')->on('t_penetapan');
            $table->foreign('id_pelaksanaan')->references('id_pelaksanaan')->on('t_pelaksanaan');
            $table->foreign('id_evaluasi')->references('id_evaluasi')->on('t_evaluasi');
            $table->foreign('id_pengendalian')->references('id_pengendalian')->on('t_pengendalian');
            $table->foreign('id_peningkatan')->references('id_peningkatan')->on('t_peningkatan');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('t_kriteria');
            $table->foreign('id_komentar')->references('id_komentar')->on('t_komentar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_detail_kriteria');
    }
};
