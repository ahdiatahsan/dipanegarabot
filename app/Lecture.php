<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'room_id', 'lecture_hour_id', 'lecturer_id', 'course_id',
    ];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function lectureHour()
    {
        return $this->belongsTo('App\LectureHour');
    }

    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
