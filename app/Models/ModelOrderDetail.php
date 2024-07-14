<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelOrderDetail extends Model
{
    use HasFactory;

    protected $table = 'tb_order_detail';

    protected $fillable = [
        'id_order',
        'id_produk',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(ModelOrder::class, 'id_order', 'id_order');
    }

    public function produk()
    {
        return $this->belongsTo(ModelProduk::class, 'id_produk', 'id_produk');
    }
}
