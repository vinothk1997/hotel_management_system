<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Booking extends Model
{
    use HasFactory;
    protected $table='bookings';
    protected $fillable=['booking_date','check_in_date','check_out_date','check_in_time','check_out_time',
    'no_of_adults','no_of_childrens','customer_id','room_id'];

    protected $dates = ['booking_date'];

    public function rooms(){
        return $this->belongsToMany(Room::class,'booking_rooms','booking_id','room_id');
    }

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id','id');

    }
                        
}
