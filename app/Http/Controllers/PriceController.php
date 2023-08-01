<?php

namespace App\Http\Controllers;
use App\Models\Price;
use App\Models\RoomType;
use App\Models\Room;

use Illuminate\Http\Request;
use DB;

class PriceController extends Controller
{
    function index(){
        $prices = DB::table('prices')
        ->join('rooms', 'prices.room_id', '=', 'rooms.id')
        ->select('rooms.room_no', 'prices.price_per_day','prices.id')
        ->get();   
        return view('prices.index',compact('prices'));
    }

    function create(){
        $roomTypes = RoomType::all();
        return view('prices.create',compact('roomTypes'));
    }
    
    function store(Request $request){
        // return $request;
        $price = new Price;
        $price->price_per_day = $request->price_per_day;
        $price->room_id = $request->room;
        $price->save();
        return redirect()->route('price.index');
    }

    function getRooms(Request $request){
        $rooms = Room::where('room_type_id',$request->room_type)->get();
        $options='';
        foreach($rooms as $room){
            $options.="<option value='$room->id'>$room->room_no</option>";
        }
       
        return $options;
    }

    function edit(Request $request){
        $price=Price::find($request->id);
        return view('prices.edit',compact('price'));
    }
    function update(Request $request){
        $price=Price::find($request->id);
        $price->price_per_day = $request->price_per_day;
        $price->save();
        return redirect()->route('price.index');
    }
}
