<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class RoomType extends Model
{
    use HasFactory;
    protected $table='room_types';
    protected $fillable=['name'];


    function room(){
        return $this->hasMany(Room::class,'id','room_type_id');
    }
}
