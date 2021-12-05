<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
	
	public const OWNER = 1;
	public const DRIVER = 2;
	public const CLIENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id", "first_name", "middle_name", "last_name", "email", "mobile", "telephone",
	    "user_type", "is_admin", "drivers_licence", "email_verified_at",
	    "password", "remember_token", "created_at", "updated_at",
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
	
	/**
	 * @return HasMany
	 */
	public function fkUserCars(): HasMany
	{
		return $this->hasMany(Car::class, 'owner', 'id');
	}
}
