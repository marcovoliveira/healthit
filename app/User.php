<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Support\FilterPaginateOrder;


class User extends Authenticatable
{
    use Notifiable;
    //use FilterPaginateOrder;

    public function role(){
        return $this->belongsToMany(role::class, 'role_users', 'user_id', 'role_id');
    }

    public function appointment(){
        return $this->hasMany('App\Appointment', 'user_id');
    }

    public function proficiencies(){
        return $this->belongsToMany('App\Proficiency'); //, 'proficiency_user', 'user_id', 'proficiency_id');
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



    /*protected $casts = [
        'especialidade' => 'array'
    ];*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'especialidade', 'seg_social', 'hora_in', 'hora_out'
    ];

    protected $filter = [
        'id', 'name', 'email', 'especialidade', 'seg_social', 'hora_in', 'hora_out'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function initialize()
    {
        return [
            'name' => '', 'email' => '', 'especialidade' => '', 'seg_social' => '', 'hora_in' => '', 'hora_out' => ''
        ];
    }





}
