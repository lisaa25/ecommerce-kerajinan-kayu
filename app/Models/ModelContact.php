<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelContact extends Model
{
    use HasFactory;

    protected $table = 'tb_kontak';

    protected $fillable = ['nama', 'email', 'pesan'];
}
