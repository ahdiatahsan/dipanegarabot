<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title', 'filename', 'filetype',
    ];

    public function information()
    {
        return $this->hasMany('App\Information');
    }
}
