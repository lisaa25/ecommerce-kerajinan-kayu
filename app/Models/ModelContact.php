<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelContact extends Model
{
    use HasFactory;

    protected $table = 'tb_kontak';
    protected $primaryKey = 'id_kontak';
    protected $fillable = ['nama', 'email', 'pesan'];
    public $incrementing = true; // Jika menggunakan auto increment
    protected $keyType = 'int'; // Tipe data primary key

}
