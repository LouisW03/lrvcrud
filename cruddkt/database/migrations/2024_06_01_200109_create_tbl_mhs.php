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
        Schema::create('tbl_mhs', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama_mhs');
            $table->foreignId('jeniskelamin')->default(1)->constrained('tbl_jk');
            $table->string('alamat');
            $table->foreignId('prodi')->constrained('tbl_prodi');
            $table->string('foto')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mhs');
    }
};