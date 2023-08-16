<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $guarded = ['id_user'];

    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    public $timestamps = false;

    public function activity_log(){
        return $this -> hasMany(ActivityLog::class , 'id_user');
    }
}
