<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cms_faqs';
    protected $guarded = [];

    public function website()
    {
        return $this->belongsTo(WebProfilModel::class, 'id_web', 'id');
    }
}
