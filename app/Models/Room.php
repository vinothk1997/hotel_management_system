<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable=['room_type_id','room_no','no_of_beds','no_of_bathrooms','width','length',
    'no_of_chairs','no_of_tables'];

    function roomType(){
        return $this->belongsTo(RoomType::class);
    }
}
