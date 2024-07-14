<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOrder extends Model
{
    use HasFactory;

    protected $table = 'tb_order';

    protected $fillable = [
        'id_user',
        'tanggal_order',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(ModelUser::class, 'id_user', 'id_user');
    }

    public function orderDetails()
    {
        return $this->hasMany(ModelOrderDetail::class, 'id_order', 'id_order');
    }
}
