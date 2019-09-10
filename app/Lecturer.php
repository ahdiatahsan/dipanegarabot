<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'nidn','name', 'gender', 'degree',
    ];

    public function lecture()
    {
        return $this->hasOne('App\Lecture');
    }
}
