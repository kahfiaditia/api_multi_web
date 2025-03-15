<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class InvDataModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'invoice_data';
    protected $guarded = [];

    public function pengirim()
    {
        return $this->belongsTo(InvPengirimModel::class, 'pengirim_id', 'id');
    }

    public function penerima()
    {
        return $this->belongsTo(InvPenerimaModel::class, 'penerima_id', 'id');
    }
}
