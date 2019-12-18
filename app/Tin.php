<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    protected $fillable = [
        'tieude',
        'mota',
        'noidung',
        'anhdaidien',
        'idnhanvien',
        'idloaitin',
        'hoatdong',
    ];

    public function nhanvien(){
        return $this->belongsTo('App\Nhanvien', 'idnhanvien', 'id');
    }
    public function loaitin(){
        return $this->belongsTo('App\Loaitin', 'idloaitin', 'id');
    }
}
