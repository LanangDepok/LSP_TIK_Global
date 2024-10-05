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
        Schema::create('siswas', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('Id_pendaftar')->autoIncrement()->primary();
            $table->string('Nm_pendaftar');
            $table->text('Alamat');
            $table->enum('Jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('No_hp');
            $table->string('Asal_sekolah');
            $table->enum('Jurusan', ['RPL', 'TKJ', 'MM']);
            $table->string('Tgl_lahir');
            $table->string('NISN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
