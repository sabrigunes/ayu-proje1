<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public static function getAllMessages()
    {
        return Message::all();
    }

    public static function deactivateMessage($id){
        $message = Message::find($id);
        $message->status = !$message->status;
        $message->save();
    }
    public static function add($name, $email, $phone, $subject, $text, $ip)
    {
        $message = new Message();
        $message->name = $name;
        $message->email = $email;
        $message->phone = $phone;
        $message->subject = $subject;
        $message->message = $text;
        $message->ip = $ip;
        $message->status = false;
        $message->save();
    }
}
