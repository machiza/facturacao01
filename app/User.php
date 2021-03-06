<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Get the empresa that owns the users.
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function perfies() {
        return $this->belongsToMany('App\Perfil')->oldest();
    }

    public function authorizeRoles($roles) {
        if($this->hasAnyRole($roles)) {
            return true;
        }
        // abort(401, 'This action is unauthorized');
        return false;
    }

    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role) {
        if($this->perfies()->where('nome',$role)->first()) {
            return true;
        }
        return false;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'type'
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
}
