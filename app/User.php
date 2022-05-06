<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Traits\Permissions\HasPermissionsTrait;
use App\Models\Subscription;
use App\Models\UserIp;

class User extends Authenticatable
{
    use Notifiable,HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        'created_at' => 'datetime:M d, h:i a',
    ];

    public function subscription()
    {
        return $this->hasOne(Subscription::class)->where('status', 'active');
    }
    public function sub()
    {
        return $this->hasOne(Subscription::class)->where('status', 'active');
    }

    public function user_ips()
    {
        return $this->hasMany(UserIp::class);
    }
}
