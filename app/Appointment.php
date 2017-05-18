<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
     protected $fillable = [
        'name', 'sns', 'especialidade', 'data', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
