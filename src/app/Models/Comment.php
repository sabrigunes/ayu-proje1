<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static function getAllComments()
    {
        return Comment::select('comments.id AS id', 'comments.comment', 'comments.rate', 'comments.comment', 'comments.car_id', 'comments.user_id', 'comments.status', 'cars.title AS car_title')
            ->join('cars', 'cars.id', '=', 'comments.car_id')->get();
    }

    public static function getCommentsForUser($user_id)
    {
        return Comment::select('comments.id AS id', 'comments.comment', 'comments.rate', 'comments.comment', 'comments.car_id', 'comments.user_id', 'comments.status', 'cars.title AS car_title')
            ->where('comments.user_id', $user_id)->join('cars', 'cars.id', '=', 'comments.car_id')->get();
    }

    public static function getCommentsForSelectedCar($carId)
    {
        return Comment::where('car_id', $carId)->where('comments.status', '1')->join('users', 'users.id', '=', 'comments.user_id')->orderBy('comments.id', 'DESC')->limit(10)->get();
    }

    public static function add($msg, $rate, $car_id, $user_id, $ip)
    {
        $comment = new Comment();
        $comment->comment = $msg;
        $comment->rate = $rate;
        $comment->car_id = $car_id;
        $comment->user_id = $user_id;
        $comment->ip = $ip;
        $comment->status = '0';
        $comment->save();
    }

    public static function edit($id, $msg, $rate){
        $comment = Comment::find($id);
        $comment->comment = $msg;
        $comment->rate = $rate;
        $comment->status = '0';
        $comment->save();
    }

    public static function deactivateComment($id){
        $comment = Comment::find($id);
        $comment->status = $comment->status == '0' || $comment->status == '-1' ? '1' : '-1';
        $comment->save();
    }

    public static function deleteComment($id){
        $comment = Comment::find($id);
        $comment->delete();
    }

    public static function prepareCommentSection($rate)
    {
        $output = '<div class="rating-list"><ul class="list">';
        for ($i = 0; $i < $rate; ++$i)
            $output .= '<li><i class="fa fa-star"></i></li>';

        return $output . '</ul></div>';
    }

    public static function prepareCommentSectionForAdmin($rate)
    {
        $output = '<div class="rating">';
        for ($i = 1; $i <= 5; ++$i)
            if($i <= $rate)
                $output .= '<div class="rating-label checked"><i class="ki-duotone ki-star fs-1"></i></div>';
            else
                $output .= '<div class="rating-label"><i class="ki-duotone ki-star fs-1"></i></div>';

        return $output . '</div>';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
