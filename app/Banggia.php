<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banggia extends Model
{
    protected $fillable = [
        'idphong',
        'gia',
        'batdau',
        'ketthuc',
    ];

    public function phong(){
        return $this->belongsTo('App\Phong', 'idphong', 'id');
    }
}
