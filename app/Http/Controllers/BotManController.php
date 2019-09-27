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
            $bot->reply(
            <<<EOT
                Hai saya adalah Dipanegara Chatbot, silahkan bertanya seputar perkuliahan di STMIK Dipanegara Makassar dengan cara mengirim perintah seperti di bawah ini :

                /dosen [nama dosen]
                Untuk menemukan informasi dosen.

                /matkul [nama/kode mata kuliah]
                Untuk menemukan informasi mata kuliah.

                /kuliah [nama ruangan]
                Untuk menemukan informasi perkuliahan.

                /informasi [nama informasi]
                Untuk menemukan informasi umum terkini.

                /file [nama file]
                Untuk menemukan dan mengunduh file.

                /ruang [nama ruangan]
                Untuk menemukan informasi lokasi ruangan.

                /perintah
                Menampilkan tautan daftar perintah chatbot.

            EOT);
        });

        // Perintah menampilkan dosen
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
                INFORMASI DOSEN

                NIDN : $lecturer->nidn
                Nama Dosen : $lecturer->name
                Pendidikan Tertinggi : $lecturer->degree
                Jenis Kelamin : $lecturer->gender
                Kehadiran : $status
                EOT);
        });

        //Perintah menampilkan mata kuliah
        $botman->hears('/matkul {hear}', function ($bot, $hear) {
            $course = DB::table('courses')
                ->where('name', 'like', '%'.$hear.'%')
                ->orWhere('code', 'like', '%'.$hear.'%')
                ->first();

            $bot->reply(
                <<<EOT
                INFORMASI MATA KULIAH

                Kode : $course->code
                Mata Kuliah : $course->name
                SKS : $course->credit
                EOT);
        });

        //Perintah menampilkan perkuliahan
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
                INFORMASI PERKULIAHAN

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

            $bot->reply(
                <<<EOT
                INFORMASI

                $information->body
                EOT);
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
                INFORMASI RUANGAN

                Nama Ruangan : $room->name
                Lantai : $room->floor
                Gedung : $room->building
                EOT
            );
        });

        //list perintah
        $botman->hears('/perintah', function (BotMan $bot) {
            $bot->reply('Daftar Perintah Dosen '.url('/lecturerList'));
            $bot->reply('Daftar Perintah Matakuliah '.url('/courseList'));
            $bot->reply('Daftar Perintah Kuliah '.url('/lectureList'));
            $bot->reply('Daftar perintah Informasi '.url('/informationList'));
            $bot->reply('Daftar perintah File '.url('/fileList'));
            $bot->reply('Daftar perintah Ruang '.url('/roomList'));
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
