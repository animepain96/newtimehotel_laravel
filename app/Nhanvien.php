<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nhanvien extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'hoten',
        'tendangnhap',
        'matkhau',
        'email',
        'ngaysinh',
        'sdt',
        'gioitinh',
        'idtinh',
        'idthanhpho',
        'diachi',
        'avatar',
        'hoatdong',
    ];

    protected $hidden = ['matkhau', 'remember_token'];

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
    public function tin(){
        return $this->hasMany('App\Tin', 'id', 'idnhanvien');
    }

}
