<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Room extends Model
{

    use HasApiTokens;
    //
    protected $fillable = [
        'room_number', 'room_name', 'room_price', 'room_description', 'image', 'tv',  'breakfast', 'wifi', 'soundproof', 'computer', 'ac',
    ];
    public function booking(){
        return $this->hasMany('App\booking');
    }   
}
