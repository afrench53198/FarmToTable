<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\Types\Array_;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function role() {
        return $this->hasOne(Role::class);
    }

    public function business() {
        return $this->hasOne(Business::class);
    }
    
   
    /**
     * checks if user has the role specified
     * @param $roles array
     */
    public function hasRole($role) {
        return $this->role->name === $role;
    }
}
