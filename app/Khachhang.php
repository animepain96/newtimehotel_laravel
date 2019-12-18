<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $fillable = [
        'hoten',
        'tendangnhap',
        'matkhau',
        'email',
        'sdt',
        'gioitinh',
        'idtinh',
        'idthanhpho',
        'diachi',
        'avatar',
        'kichhoat',
        'hoatdong',
    ];

    public function thanhpho()
    {
        return $this->hasOne('App\Diachi', 'id', 'idthanhpho');
    }
    public function tinh()
    {
        return $this->hasOne('App\Diachi', 'id', 'idtinh');
    }

    public function danhgia(){
        return $this->hasMany('App\Danhgia', 'id', 'idkhachhang');
    }

    public function thue(){
        return $this->hasMany('App\Thue', 'id', 'idkhachhang');
    }
}
