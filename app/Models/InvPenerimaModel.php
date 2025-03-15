<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvPenerimaModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'invoice_penerima';
    protected $guarded = [];

    public function pengirim()
    {
        return $this->belongsTo(InvPengirimModel::class, 'pilih_pengirim', 'id');
    }
}
