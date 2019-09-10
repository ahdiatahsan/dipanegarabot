<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code', 'name', 'credit',
    ];

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }
}
