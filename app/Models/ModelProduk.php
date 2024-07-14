<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProdukController;


class ModelProduk extends Model
{
    public $primaryKey ='id_produk';

    protected $table ='tb_produk';

    protected $fillable =['nama_produk', 'harga', 'gambar_produk', 'kategori', 'deskripsi'];
}
