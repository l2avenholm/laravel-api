<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'api_token', 'expiration', 'role', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'expiration',
    ];

    /**
     * Disabling timestamps for User entity.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Check whether token is active and not expired.
     *
     * @return bool
     */
    public function isTokenActive()
    {
        return strtotime($this->expiration) > time();
    }

    /**
     * Check whether user has one of provided roles.
     *
     * @param $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        return in_array($this->role, $roles);
    }
}
