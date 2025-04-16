<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesaBannerModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'desa_banner';
    protected $guarded = [];
}
