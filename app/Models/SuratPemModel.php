<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPemModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat_pemberitahuan';
    protected $guarded = [];
}
