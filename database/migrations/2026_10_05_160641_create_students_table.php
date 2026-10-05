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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('nama_murid');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
        $table->date('tanggal_lahir');
        $table->string('foto_murid')->nullable();
        $table->string('nama_ortu');
        $table->string('hp_ortu');
        $table->string('pekerjaan_ortu');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
