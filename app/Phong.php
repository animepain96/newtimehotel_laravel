<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    protected $fillable = [
        'tenphong',
        'tienich',
        'songuoilon',
        'sotreem',
        'dientich',
        'sogiuong',
        'idloai',
        'idvitri',
        'hinhdaidien',
        'hoatdong',
        'ghichu',
    ];

    public function loaiphong(){
        return $this->belongsTo('App\Loaiphong', 'idloai', 'id');
    }

    public function vitri(){
        return $this->belongsTo('App\Vitri', 'idvitri', 'id');
    }

    public function banggia(){
        return $this->hasMany('App\Banggia', 'id', 'idphong');
    }

    public function anhmota(){
        return $this->hasMany('App\Anhmota', 'idphong', 'id');
    }
}
