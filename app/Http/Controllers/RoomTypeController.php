<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;

class RoomTypeController extends Controller
{
    function index(){
        $roomTypes=RoomType::all();
        return view('room-type.index',compact('roomTypes'));

    }

    function create(){
        return view('room-type.create');
    }

    function store(Request $request){
        $roomType = new RoomType;
        $roomType->type=$request->room_type;
        $roomType->save();
        return redirect()->route('roomType.index');
    }

    function edit(Request $request){
        $roomType=RoomType::find($request->room_type_id);
        return view('room-type.edit',compact('roomType'));
    }

    function update(Request $request){
        $roomType=RoomType::find($request->room_type_id);
        $roomType->type=$request->room_type;
        $roomType->save();
        return redirect()->route('roomType.index');
    }

    function show(Request $request){
        $room_type_id=$request->room_type_id;
        $rooms=Room::where('room_type_id',$room_type_id)->get();
        return view('room-type.show',compact('rooms'));
    }
}
