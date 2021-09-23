<?php

namespace App\Console\Commands;

use App\Mail\MailToUser;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail will be sent every hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userData = User::all();
        foreach ($userData as $singleUser){

            Mail::to($singleUser->email)->send(new MailToUser($singleUser->email));
//            dd('sent');
        }


//        $result = Mail::send('email.how_are_you',['content' => 'This is the email Content'], function($message) {
//            $message->from('nahidhp2@gmail.com');
//            $message->to('nahidprince7@gmail.com')
//                ->subject('Test Email');
//
//        });
//
//        return $result;


    }
}
