<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table='staffs';
    protected $fillable=['fname','lname','phone_no','email','nic','dob','gender','position','address'];

}
