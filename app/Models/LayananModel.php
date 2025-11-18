<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayananModel extends Model
{
    
   
    use HasFactory, SoftDeletes;
    protected $table = 'cms_layanan_legal';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(ProdukLegalModel::class, 'id_produk_legal');
    }
}
