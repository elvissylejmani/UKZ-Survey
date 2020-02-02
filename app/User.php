<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   
    public function Groups()
    {
        return $this->belongsToMany(group::class);
    }
    public function IsAdmin()
    {
        if ($this->type == 'Admin') {
            return true;
        }
        else {
            return false;
        }
    }
    public function Surveys()
    {
       $us = DB::table('users')
        ->where('users.id', '=', Auth::id())
        ->join('group_user', 'users.id', '=', 'group_user.User_ID')
        ->join('groups', 'group_user.Group_ID', '=', 'groups.id')
        ->join('surveys', 'groups.id', '=', 'surveys.Group_ID')
        ->select('surveys.SurveyTitle','users.id')
        ->get();
        dd($us);
}
}
