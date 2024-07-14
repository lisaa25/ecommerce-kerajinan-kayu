<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->text('deskripsi')->nullable(); 
            $table->string('harga', 255)->change(); 
        });
    }

    public function down(): void
    {
        Schema::table('tb_produk', function (Blueprint $table) {
            $table->dropColumn('deskripsi'); // Menghapus kolom deskripsi
            $table->decimal('harga', 8, 2)->change(); // Mengembalikan kolom harga ke decimal
        });
    }
};
