<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name', 'body', 'information_category_id', 'file_id',
    ];

    public function informationCategory()
    {
        return $this->belongsTo('App\InformationCategory');
    }

    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
