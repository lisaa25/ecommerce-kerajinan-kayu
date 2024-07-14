<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ModelUser extends Authenticatable
{
    use HasFactory, Notifiable;

    Protected $table ='tb_user'; //menentukan tabel
    //menentukan atribut yg dapat di isi
    protected $fillable = [
        'nama',
        'no_telepon',
        'alamat',
        'email',
        'password',
    ];

    //fungsi untuk relasi one-to-many ke model order
    public function orders()
    {
        return $this->hasMany(ModelOrder::class, 'id_user', 'id_user');
    }
}
