<?php

namespace App;

use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
use App\Quotation;

class Appointment extends Model
{
    //use FilterPaginateOrder;

     protected $fillable = [
        'name', 'realizada', 'sns', 'especialidade', 'data', 'user_id','user.name', 'sintomas', 'diagnostico', 'created_at', 'updated_at'
    ];

   /* protected $filter = [
        'id', 'realizada', 'name', 'sns', 'especialidade', 'data', 'user_id', 'sintomas', 'diagnostico', 'created_at',

        'user.id', 'user.name', 'user.email', 'user.especialidade', 'user.seg_social', 'user.hora_in', 'user.hora_out'
    ];*/

  /*  public static function initialize(){
        return [
            'user_id' => 'Select',
            'name' => 'Appointment for ',
            'data' => date('y-m-d'),
            'updated_at' => null,
            

        ];

    }*/

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
 public function scopeSearch($query, $s)
 
 {
        
     
        $query->where('name', 'like', '%' .$s. '%')
        ->orWhere('especialidade', 'like', '%' .$s. '%')
        ->orWhere('sns', 'like', '%' .$s. '%' )
        ->orWhereHas('user', function($query) use($s){
            $query->where('name', 'like', '%' .$s. '%');
        });

 }





}
