<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    public const ROLE_USER = 0;
    public const ROLE_MACHINIST = 1;
    public const ROLE_ADMIN = 2;
    public const ROLE_SADMIN = 3;
    public static int $deactive=1;   //its equal 1 bceause it check deactived users
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'deactive',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isUser()
    {
        return $this->role==self::ROLE_USER;        
    }

    public function isMachinist()
    {
        return $this->role===self::ROLE_MACHINIST;        
    }

    public function isAdmin()
    {
        return $this->role===self::ROLE_ADMIN;        
    }

    public function isSadmin()
    {
        return $this->role===self::ROLE_SADMIN;
    }

    public function isDeactive()
    {
        return $this->deactive===self::$deactive;
    }
}
