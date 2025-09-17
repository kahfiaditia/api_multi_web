<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SosialModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cms_sosial_media';
    protected $guarded =[];
}
