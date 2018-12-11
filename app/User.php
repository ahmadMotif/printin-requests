<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

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

    // Employees Scope
    public function scopeEmployees ($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->whereNotIn('name', ['translator', 'writer', 'user']);
        });
    }
    // Customers Scope
    public function scopeCustomers ($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->whereIn('name', ['translator', 'writer', 'user']);
        });
    }
}
