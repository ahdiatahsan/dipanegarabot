<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use Illuminate\Support\Facades\DB;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('/start', function ($bot) {
            $bot->reply('Your First Response');
        });

        // Untuk Dosen
        $botman->hears('/dosen {hear}', function ($bot, $hear) {
            $lecturer = DB::table('lecturers')
                ->where('name', 'like', '%'.$hear.'%')
                ->first();

            $status;
            if ($lecturer->status == "H") {
                $status = "Hadir";
            }else{
                $status = "Tidak Hadir";
            }

            $bot->reply(
                <<<EOT
                Nama Dosen : $lecturer->name
                Pendidikan Tertinggi : $lecturer->degree
                Jenis Kelamin : $lecturer->gender
                Kehadiran : $status
                EOT);
        });

        //Perintah Mata Kuliah
        $botman->hears('/matkul {hear}', function ($bot, $hear) {
            $course = DB::table('courses')
                ->where('name', 'like', '%'.$hear.'%')
                ->orWhere('code', 'like', '%'.$hear.'%')
                ->first();

            $bot->reply(
                <<<EOT
                Kode : $course->code
                Mata Kuliah : $course->name
                SKS : $course->credit
                EOT);
        });

        //Perintah Perkuliahan
        $botman->hears('/kuliah {hear}', function ($bot, $hear) {
            $lecture = DB::table('lectures')
            ->join('rooms', 'lectures.room_id', '=', 'rooms.id')
            ->join('lecture_hours', 'lectures.lecture_hour_id', '=', 'lecture_hours.id')
            ->join('lecturers', 'lectures.lecturer_id', '=', 'lecturers.id')
            ->join('courses', 'lectures.course_id', '=', 'courses.id')
            ->select([
                'courses.name as course',
                'lecture_hours.time',
                'lecturers.name as lecturer',
                'lectures.status as status',
                'rooms.name as room',
            ])
            ->where('rooms.name', 'like', '%'.$hear.'%')->first();

            $status;
            if ($lecture->status == 1) {
                $status = 'Berlangsung';
            }else{
                $status = 'Tidak Berlangsung';
            }

            $bot->reply(
                <<<EOT
                Ruangan : $lecture->room
                Mata Kuliah : $lecture->course
                Jam Kuliah : $lecture->time
                Dosen : $lecture->lecturer
                Status Perkuliahan : $status
                EOT);
        });

        //informasi perkuliahan
        $botman->hears('/informasi {hear}', function ($bot, $hear) {
            $information = DB::table('information')
            ->where('name', 'like', '%'.$hear.'%')
            ->first();

            $bot->reply($information->body);
        });

        //informasi File
        $botman->hears('/file {hear}', function ($bot, $hear) {
            $file = DB::table('files')
            ->where('title', 'like', '%'.$hear.'%')
            ->first();

            $attachment = new File(asset('storage/'.$file->filename), [
                'custom_payload' => true,
            ]);

            $message = OutgoingMessage::create($file->title)->withAttachment($attachment);
            $bot->reply($message);
        });

        //informasi perkuliahan
        $botman->hears('/ruang {hear}', function ($bot, $hear) {
            $room = DB::table('rooms')
            ->where('name', 'like', '%'.$hear.'%')
            ->first();

            $bot->reply(
                <<<EOT
                Nama Ruangan : $room->name
                Lantai : $room->floor
                Gedung : $room->building
                EOT
            );
        });

        //Fallback Error
        $botman->fallback(function($bot) {
            $bot->reply('Perintah yang anda input salah !');
        });

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
