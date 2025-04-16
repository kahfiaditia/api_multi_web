<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesaGaleryModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'desa_galery';
    protected $guarded =[];
}
