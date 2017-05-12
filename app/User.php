<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function role(){
        return $this->belongsToMany(role::class, 'role_users');
    }
    public function appointment(){
        return $this->belongsToMany('App\Appointment', 'user_id');
    }
    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role){
                if ($this->hasRole($role)){
                    return true; 
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true; 
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->role()->where('name', $role)->first()){
        return true; 
        }
    return false;
    }

    protected $casts = [
        'especialidade' => 'array'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'especialidade', 'seg_social', 'hora_in', 'hora_out',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
