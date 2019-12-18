<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anhmota extends Model
{
    protected $fillable = [
        'idphong',
        'urlanh',
    ];

    public function phong(){
        return $this->belongsTo('App\Phong', 'idphong', 'id');
    }
}
