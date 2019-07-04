<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class booking extends Model
{

    use HasApiTokens;
    //
    protected $fillable = [
        'room_id', 'user_id', 'arrival', 'departure', 'night',  'payment', 'children', 'adult', 'confirm', 'ref_id'
    ];   

   public function user(){
       return $this->belongsTo('App\User');
   }
   public function room(){
    return $this->belongsTo('App\Room');
}
}
