<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id('id'); 
            $table->string('nama');
            $table->string('no_telepon')->default('')->change();
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        }); 
    }


    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
