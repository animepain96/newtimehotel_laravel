<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $fillable = [
        'urlanh',
        'tieude',
        'mota',
        'lienket',
        'hoatdong'
    ];
}
