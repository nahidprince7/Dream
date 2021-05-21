<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name','email','password', 'picture', 'number', 'gender',
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

    public function userRoles()
    {
        return $this->hasMany(\App\UserRole::class);
    }

    public function getRoleAttribute()
    {
        if (session()->has('userRole')) {
            // If so return first name
            return session('userRole');
        }
        $roles = $this->userRoles()->select("role_id")->pluck("role_id")->toArray();
        session(['userRole' => $roles]);
        return $roles;
        //return Auth::user()->userRoles()->select("role_id")->pluck("role_id")->toArray();
    }

    public static function detroySessionUserRole()
    {
        if (session()->has('userRole')) {
            session()->forget('userRole');
        }
    }

}
