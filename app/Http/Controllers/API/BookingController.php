<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
            'room_id' => 'required',
            'user_id' => 'required',
            'arrival' => 'required',
            'departure' => 'required',            
            'night' => 'required',   
            'payment' => 'required',
            'children' => 'required',
            'adult' => 'required',                     
        ]);                               

        $rooms = DB::table('bookings')->where('room_id', $request->room_id)->get();
        if(count($rooms) === 0){   
            $anss = "available";
        if (strpos($anss, 'not available') === false) {

            setcookie('room_id' , $request->room_id , time()+3600 );
            setcookie('user_id' , $request->user_id , time()+3600 );
            setcookie('arrival' , $request->arrival , time()+3600 );
            setcookie('departure' , $request->departure , time()+3600 );
            setcookie('night' , $request->night , time()+3600 );
            setcookie('payment' , $request->payment , time()+3600 );
            setcookie('children' , $request->children , time()+3600 );
            setcookie('adult' , $request->adult , time()+3600 );       

        return $request->all();

        } else {
            return response()->json([
                'status' => 'error',
                'msg'    => 'The selected date ' . $request->arrival .' to '. $request->departure . ' has been booked <br> Please select another date',
                'errors' => 'my personal error',
            ], 422);
        }
        
                
    } else {                      
    for ($x = 0; $x < count($rooms); $x++) {
       $start = $request->arrival;
       $barrival = $rooms[$x]->arrival;
       $bdeparture = $rooms[$x]->departure;                                

       if(($start >= $barrival) && ($start <= $bdeparture) && ($request->room_id = $rooms[$x]->room_id)){
           $anss = 'not available';
       } else {
        $start2 = $request->departure;
        $aarrival = $rooms[$x]->arrival;
        $adeparture = $rooms[$x]->departure;
        if(($start2 >= $aarrival) && ($start2 <= $adeparture) && ($request->room_id = $rooms[$x]->room_id)){
            $anss = 'not available';
        } else {
            $start3 = $rooms[$x]->arrival;
            $aarrival = $request->arrival;
            $adeparture = $request->departure;
            if(($start3 >= $aarrival) && ($start3 <= $adeparture) && ($request->room_id = $rooms[$x]->room_id)){
                $anss = 'not available';
            } else {
               $anss = 'available';
            } 
        } 
       }  
    }                                         

    

    if (strpos($anss, 'not available') === false) {

        setcookie('room_id' , $request->room_id , time()+3600 );
        setcookie('user_id' , $request->user_id , time()+3600 );
        setcookie('arrival' , $request->arrival , time()+3600 );
        setcookie('departure' , $request->departure , time()+3600 );
        setcookie('night' , $request->night , time()+3600 );
        setcookie('payment' , $request->payment , time()+3600 );
        setcookie('children' , $request->children , time()+3600 );
        setcookie('adult' , $request->adult , time()+3600 );       

    return $request->all();

    } else {
        return response()->json([
            'status' => 'error',
            'msg'    => 'The selected date ' . $request->arrival .' to '. $request->departure . ' has been booked <br> Please select another date',
            'errors' => 'my personal error',
        ], 422);
    }
        
}
  
            
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
    }

     public function reservations()
    {
        //
        return booking::with('user', 'room')->where('confirm', 1)->get();
    }  

    public function userreservations()
    {
        //
        $user = Auth::user()->id;
        return booking::with('user', 'room')->where('user_id', $user)->get();
    }

    public function confirmReservations()
    {
        //
        return booking::with('user', 'room')->where('confirm', 0)->get();
    } 

    public function confirmReservationsStore($id)
    {
        //
        $booking = booking::findOrFail($id);
             
        $booking->confirm = '1';
                   
        $booking->update();
    } 

    public function cbrooms()
    {
        //       
        $bookings =  booking::all();

        return count($bookings);
    }

    public function cuserreservations()
    {
        //
        $user_id = Auth::user()->id;
        $user = booking::where('user_id', $user_id)->get();
        return count($user);
    }
   
}
