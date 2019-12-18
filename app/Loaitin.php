<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    protected $fillable = [
        'ten',
        'mota',
    ];

    public function tin(){
        return $this->hasMany('App\Tin', 'idloaitin', 'id');
    }
}
