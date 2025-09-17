<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisiMisiModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cms_visi_misi';
    protected $guarded =[];
}
