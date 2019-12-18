<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinnhan extends Model
{
    protected $fillable = [
        'hoten',
        'email',
        'tieude',
        'noidung',
    ];
}
