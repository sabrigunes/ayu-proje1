<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public static function getAllUsers(){
        return User::all();
    }

    public static function getUser($id){
        return User::find($id);
    }



    public static function add($name, $surname, $email,$phone, $password, $is_admin=false){
        $user = new User();
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = Hash::make($password);
        $user->status = true;
        $user->is_admin = $is_admin;
        $user->save();
    }

    public static function edit($id, $name, $surname, $email, $password, $is_admin=false){
        $user = User::find($id);
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->password = $password;
        $user->status = true;
        $user->is_admin = $is_admin;
        $user->created_at = Carbon::now();
        $user->save();
    }

    public static function exists($email){
        return User::where('email', $email)->count() > 0;

    }

    public static function findWithEmail($email){
        return User::where('email', $email)->first();

    }

    public static function deactivateUser($id){
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
    }

    public static function changeAuthUser($id){
        $user = User::find($id);
        $user->is_admin = !$user->is_admin;
        $user->save();
    }

    public static function deleteUser($id){
        $user = User::find($id);
        $user->delete();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
