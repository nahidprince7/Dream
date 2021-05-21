<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserRole extends Model
{
    use Notifiable,SoftDeletes;
    protected $fillable=[
        'id','user_id','role_id',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
