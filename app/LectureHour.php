<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureHour extends Model
{
    protected $fillable = [
        'time',
    ];

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }
}
