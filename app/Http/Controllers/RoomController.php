<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    function create(Request $request){
        $room_type_id=$request->room_type_id;
        return view('room.create',compact('room_type_id'));
    }

    function store(Request $request){
        $room = new Room;
        $room->room_type_id=$request->room_type_id;
        $room->room_no=$request->room_no;
        $room->no_of_beds=$request->no_of_beds;
        $room->no_of_bathrooms=$request->no_of_bathrooms;
        $room->width=$request->width;
        $room->length=$request->length;
        $room->no_of_chairs=$request->no_of_chairs;
        $room->no_of_tables=$request->no_of_tables;
        $room->no_of_tables=$request->no_of_tables;
        $room->is_occupied="No";
        $room->save();
        return redirect()->to('room-types/show?room_type_id='.$request->room_type_id);
    }

    function maintanaceMode(Request $request){
        $obj = Room::find($request->room_id);
        if($obj->is_occupied=="No"){
            $obj->is_occupied="Maintanance";
        }
        elseif($obj->is_occupied=="Maintanance"){
            $obj->is_occupied="No";
        }
        else{
            $obj->is_occupied=$obj->is_occupied;
        }
        $obj->save();
        return redirect()->back();
    }

    function edit(Request $request){
        $room = Room::find($request->room_id);
        return view('room.edit',compact('room'));

    }

    function delete(Request $request){
        $room = Room::find($request->room_id);
        $room->delete();
        return redirect()->back();

    }
}
