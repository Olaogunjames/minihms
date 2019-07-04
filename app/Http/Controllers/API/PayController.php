<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\booking;

class PayController extends Controller
{   


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

    public function reserve(Request $request)
    {
        //
        $reserve = new booking;
        $reserve->room_id = $_COOKIE['room_id'];
        $reserve->user_id = $_COOKIE['user_id'];
        $reserve->arrival = $_COOKIE['arrival'];
        $reserve->departure = $_COOKIE['departure']; 
        $reserve->night = $_COOKIE['night'];
        $reserve->payment = $_COOKIE['payment'];
        $reserve->children = $_COOKIE['children'];
        $reserve->adult = $_COOKIE['adult']; 
        $reserve->ref_id = $request->ref_id; 
        $reserve->confirm = '0';       
        
        $reserve->save();
    }
}
