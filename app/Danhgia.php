<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model
{
    protected $fillable = [
        'idkhachhang',
        'noidung',
        'hienthi',
    ];

    public function khachhang(){
        return $this->belongsTo('App\Khachhang', 'idkhachhang', 'id');
    }
}
