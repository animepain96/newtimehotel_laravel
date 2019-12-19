<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Khachhang extends Authenticatable
{

    use Notifiable;

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

    public function getAuthPassword()
    {
        return $this->matkhau;
    }

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
