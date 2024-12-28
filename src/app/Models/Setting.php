<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    public static function getSettings()
    {
        return Setting::find(1);
    }

    public static function edit($title, $keywords, $description, $company, $address, $phone, $fax, $email, $smtp_server, $smtp_port, $smtp_email, $smtp_password, $facebook, $instagram, $twitter, $about_us, $contact, $references)
    {
        $settings = Setting::find(1);
        $settings->title = $title;
        $settings->keywords = $keywords;
        $settings->description = $description;
        $settings->company = $company;
        $settings->address = $address;
        $settings->phone = $phone;
        $settings->fax = $fax;
        $settings->email = $email;
        $settings->smtp_server = $smtp_server;
        $settings->smtp_port = $smtp_port;
        $settings->smtp_email = $smtp_email;
        $settings->smtp_password = $smtp_password;
        $settings->facebook = $facebook;
        $settings->instagram = $instagram;
        $settings->twitter = $twitter;
        $settings->about_us = $about_us;
        $settings->contact = $contact;
        $settings->references = $references;
        $settings->save();

    }
}


