<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Price;
use App\Models\payment;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Services\Common;
class BookingController extends Controller
{
    function index(){
        $bookings=Booking::all();
        return view('bookings.index',compact('bookings'));
    }

    function customerBooking(){
        $customer_id= session()->get('user')['real_name']->id;
        $bookings = Booking::where('customer_id',$customer_id)->get();
        // return $bookings;
        return view('bookings.customer-index',compact('bookings','customer_id'));
    }
    function create(Request $request){
        $customer_id=$request->customer_id;
        $roomTypes=RoomType::all();
        return view('bookings.create',compact('customer_id','roomTypes'));
    }

    function payment(Request $request){
         $validated = $request->validate([
        'arival_date' => 'required',
        'departure_date' => 'required',
        'room' => 'required',
        'arival_time' => 'required',
        'departure_time' => 'required',
        ]);

        $total_per_day=Price::whereIn('room_id',$request->room!=null?$request->room:[])->sum('price_per_day');
        $arrivalDate = Carbon::parse($request->arival_date);
        $departureDate = Carbon::parse($request->departure_date);
        $numberOfDays = $arrivalDate->diffInDays($departureDate);
        $total = $total_per_day*$numberOfDays;
        // return $total_per_day;
        $room_no =Room::whereIn('id',$request->room!=null?$request->room:[])->pluck('room_no')->implode(',');
        $no_of_rooms=collect($request->room)->count();
        $no_of_adults = $request->no_of_adults??0;
        $no_of_childrens = $request->no_of_children??0;
        $booking=[
            'booking_date'=>Carbon::now(),
            'check_in_date' =>$request->arival_date,
            'check_out_date'=>$request->departure_date,
            'check_in_time'=>$request->arival_time,
            'check_out_time'=>$request->departure_time,
            'no_of_adults' => $request->no_of_adults,
            'no_of_childrens'=> $request->no_of_children,
            'customer_id' => $request->customer_id,
            'rooms' =>$request->room,
            'total'=>$total,
            'room_no'=>$room_no,
            'no_of_rooms'=>$no_of_rooms,
            'no_of_adults' =>$no_of_adults,
            'no_of_childrens' => $no_of_childrens
        ];

        session()->put('booking',$booking);
        
        return view('payment.add',compact('total','no_of_rooms','no_of_adults','no_of_childrens','room_no'));

    }

    function store(Request $request){
        if(session()->has('booking')){
            $bookingData=Session::get('booking');
            $validated = $request->validate([
                'payment_method' => 'required',
                ]);
            $user=Session::get('user');
            // return $bookingData;
            $booking = new Booking;
            $booking->booking_date = $bookingData['booking_date'];
            $booking->check_in_date = $bookingData['check_in_date'];
            $booking->check_out_date = $bookingData['check_out_date'];
            $booking->check_in_time = $bookingData['check_in_time'];
            $booking->check_out_time = $bookingData['check_out_time'];
            $booking->no_of_adults = $bookingData['no_of_adults'];
            $booking->no_of_childrens = $bookingData['no_of_childrens'];
            $booking->status = 'booked';
            $booking->customer_id = $bookingData['customer_id'];
            $booking->save();
    
            $obj=Room::whereIn('id',$bookingData['rooms'])
            ->update(['is_occupied'=>'Yes']);
    
            foreach($bookingData['rooms'] as $room){
                $booking->rooms()->attach($room);
            }
            // To send message
            $phone_no = $booking->customer->phone_no;
            $msg='Dear'.' '.$booking->customer->lname.
            'You have booked the below mentioned rooms with us,thank you, '.'Room_no'.$bookingData['room_no'];
    
            Common::message($phone_no,$msg);
    
            // store Payment 
            $payment = new Payment;
            $payment->amount=$bookingData['total'];
            $payment->method_of_payment	=$request->payment_method;
            $payment->status='Not Paid';
            $payment->customer_id=$bookingData['customer_id'];
            $payment->booking_id=$booking->id;
            $payment->save();
    
            $pdf = Pdf::loadView('payment.receipt',['bookingData'=>$bookingData],['user'=>$user]);
            session()->forget('booking');
            return $pdf->download('document.pdf');
        }
        else{
            if(session()->get('user')['user_type']=='admin'){
                return redirect()->to('/customers/show?id='.session()->get('user')['real_name']->id);
            }
            else{
                return redirect()->to('bookings/cutomer-booking');
            }
            
        }
        
    }
    function getRooms(Request $request){
        // return $request;
        $room_type_id = $request->room_type;
        $rooms = Room::where('room_type_id',$room_type_id)
        ->where('is_occupied','No')->get();
        $tableRows='';
        foreach($rooms as $room){
            $tableRows .= "<tr class='room-row'>
            <td><input type='checkbox' name='room[]' value='$room->id'</td>
            <td>$room->room_no</td>
            <td>$room->no_of_beds</td>
            <td>$room->no_of_bathrooms</td>
            <td>$room->no_of_chairs</td>
            <td>$room->no_of_tables</td>
            </tr>";
        }
        if(!empty($tableRows)){
            return $tableRows;
        }
        else{
            return "<tr class='room-row' >
            <td colspan='5' class='text-center'>No Rooms Availbale For Booking, Sorry!</td>
            </tr>";
        }
    }

    function edit(Request $request){
        $roomTypes=RoomType::all();
        $booking = Booking::find($request->id);
        return view('bookings.edit',compact('booking','roomTypes'));
    }

    
    function editGetRooms(Request $request){
        $room_type_id = $request->room_type;
        $booking = Booking::find($request->id);
        $bookedRooms= $booking->rooms()->pluck('rooms.id as room_id')->toArray();
        $rooms = Room::where('room_type_id',$room_type_id)
        ->where('is_occupied','No')->get();
        $tableRows='';
        foreach($rooms as $room){
            $isChecked = in_array($room->id, $bookedRooms) ? 'checked' : '';
            $tableRows .= "<tr class='room-row'>
            <td><input type='checkbox' name='room[]' value='$room->id' $isChecked></td>
            <td>$room->room_no</td>
            <td>$room->no_of_beds</td>
            <td>$room->no_of_bathrooms</td>
            <td>$room->no_of_chairs</td>
            <td>$room->no_of_tables</td>
            </tr>";
        }
        if(!empty($tableRows)){
            return $tableRows;
        }
        else{
            return "<tr class='room-row' >
            <td colspan='5' class='text-center'>No Rooms Availbale For Booking, Sorry!</td>
            </tr>";
        }
    }

    function cancelBooking(Request $request){
        $booking = Booking::find($request->id);
        if(Carbon::today()<$booking->check_in_date){
            $booking->status = 'Cancelled';
            $booking->save();
            
            $roomReleased=$booking->rooms()
            ->update(
                ['rooms.is_occupied'=>'No']
            );
            return redirect()->back();
        }
        else{
            echo "
            <script>
            alert('you are unable to cancel the booking, contact us');
            </script>";
            return redirect()->back();
           
        }
    }

    function checkOut(Request $request){
        $booking  = Booking::find($request->id);
        $booking->status='checkOut';
        $booking->save();

        $rooms = $booking->rooms()->pluck('rooms.id');
        Room::whereIn('id',$rooms)
        ->update([
            'is_occupied'=>'No',
        ]);

    }

}
