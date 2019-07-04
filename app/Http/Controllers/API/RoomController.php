<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\User;
use Image;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'room_number' => 'required | unique:rooms',
            'room_name' => 'required | string | max:191',
            'room_price' => 'required',
            'room_description' => 'required',            
            'image' => 'required',            
        ]);   


        $name = time() . ".png";
        Image::make($request->image)->save( public_path('image/' . $name) );        

        $room = new Room;
        $room->room_number = $request->room_number;       
        $room->room_name = $request->room_name;
        $room->room_price = $request->room_price;
        $room->room_description = $request->room_description;
        $room->image = $name;
        $room->tv = $request->tv;       
        $room->breakfast = $request->breakfast;
        $room->wifi = $request->wifi;
        $room->soundproof = $request->soundproof;
        $room->computer = $request->computer;       
        $room->ac = $request->ac;

        $room->save(); 
    // return $request->image;
                   
        // return Room::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $room = Room::findOrFail($id);

        return $room;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $room = Room::findOrFail($id);
        $this->validate($request, [
            'room_number' => 'required | unique:rooms,room_number,'.$room->id,
            'room_name' => 'required | string | max:191',
            'room_price' => 'required',
            'room_description' => 'required',            
            'image' => 'required',           
        ]);             

        if(preg_match('/base64/', $request->image)){
        $name = time() . ".png";
        Image::make($request->image)->save( public_path('image/' . $name) ); 
        $room->image = $name;       
        }

        $room->room_number = $request->room_number;       
        $room->room_name = $request->room_name;
        $room->room_price = $request->room_price;
        $room->room_description = $request->room_description;        
        $room->tv = $request->tv;       
        $room->breakfast = $request->breakfast;
        $room->wifi = $request->wifi;
        $room->soundproof = $request->soundproof;
        $room->computer = $request->computer;       
        $room->ac = $request->ac;
                   
        $room->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $room = Room::findOrFail($id);   
      
        $room->delete(); 
    }
    
    
    public function users()
    {
        //
        return User::all();
        
    }

    public function profile()
    {
        //
        return Auth::user();
        
    }

    public function updateuser(Request $request, $id)
    {
        //

        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',                      
        ]);             
       

        $user->name = $request->name;       
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;        
                   
        $user->update();
    }

    public function deleteuser($id)
    {
        //
        $user = User::findOrFail($id);   
      
        $user->delete(); 
        // return $user;
    }

    public function crooms()
    {
        //      
        $rooms =  Room::all();

        return count($rooms);
    }

    public function cusers()
    {
        //       
        $users =  User::all();

        return count($users);
    }
}
