<?php

namespace GetShitDone;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user has many objectives.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

    /**
     * Automatically hash the password if one is being set.
     *
     * This allows us to blindly throw passwords into this model and provides a centralized
     * location for changing the hashing function later.
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value !== null) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
