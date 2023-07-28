<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Customer extends Model
{
    use HasFactory;
    
    protected $table='customers';
    protected $fillable=['fname','fname','fname','nic','nic','address','phone_no','email'];


    public function booking(){
        return $this->hasMany(Booking::class,'id','customer_id');
    }
}
