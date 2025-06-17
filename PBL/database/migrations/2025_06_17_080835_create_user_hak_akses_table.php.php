<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHakAksesTable extends Migration
{
    public function up()
    {
        Schema::create('user_hak_akses', function (Blueprint $table) {
            $table->id('id_akses'); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedInteger('id_user'); // HARUS sama dengan tipe di m_user
            $table->unsignedInteger('id_kriteria');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('m_user')->onDelete('cascade');
            $table->unique(['id_user', 'id_kriteria']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_hak_akses');
    }
}
