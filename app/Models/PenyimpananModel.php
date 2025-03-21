<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenyimpananModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'penyimpanan';
    protected $guarded = [];

    public function nama_buku()
    {
        return $this->belongsTo(BukuModel::class, 'id_buku', 'id');
    }

    public function keterangan()
    {
        return $this->belongsTo(RakModel::class, 'id_rak', 'id');
    }
}
