<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diachi extends Model
{
    public function tinh()
    {
        return $this->hasOne('App\Diachi', 'id', 'idtinh');
    }
}
