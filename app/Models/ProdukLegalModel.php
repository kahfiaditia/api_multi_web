<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukLegalModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cms_produk_legals';
    protected $guarded =[];
}
