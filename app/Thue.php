<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thue extends Model
{
    protected $fillable = [
        'idkhach',
        'idphong',
        'batdau',
        'ketthuc',
        'idtrangthai',
        'ghichu',
    ];

    public function khachhang(){
        return $this->belongsTo('App\Khachhang', 'idphong','id');
    }
    public function phong(){
        return $this->belongsTo('App\Phong', 'idphong', 'id');
    }
    public function trangthaithue(){
        return $this->belongsTo('App\Trangthaithue', 'idtrangthai', 'id');
    }
}
