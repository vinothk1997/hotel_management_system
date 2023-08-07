<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use Carbon\Carbon;


class DashboardController extends Controller
{
    function genderBasedGraph(){
       $customer=Customer::all();
       $male = $customer->where('gender','Male')->count();
       $female = $customer->where('gender','Female')->count();
       $customers=[
        'male'=>$male,
        'female' => $female
       ];
       return $customers;
    }

    function DOBBasedGraph(){
        $data=[];
        $data = [
            'm_data_1' => self::generateAgeAndGenderBasisData(0,18,'Male'),
            'm_data_2' => self::generateAgeAndGenderBasisData(18,25,'Male'),
            'm_data_3' => self::generateAgeAndGenderBasisData(25,40,'Male'),
            'm_data_4' => self::generateAgeAndGenderBasisData(40,60,'Male'),
            'm_data_5' => self::generateAgeAndGenderBasisData(60,100,'Male'),
            'f_data_1' => self::generateAgeAndGenderBasisData(0,18,'Female'),
            'f_data_2' => self::generateAgeAndGenderBasisData(18,25,'Female'),
            'f_data_3' => self::generateAgeAndGenderBasisData(25,40,'Female'),
            'f_data_4' => self::generateAgeAndGenderBasisData(40,60,'Female'),
            'f_data_5' => self::generateAgeAndGenderBasisData(60,100,'Female')
        ];
      
        return $data ;
    }
    static function generateAgeAndGenderBasisData($start,$end,$gender){
        return (int)(Customer::where('dob', '<', Carbon::now()->subYear($start))
        ->where('dob', '>', Carbon::now()->subYear($end))
        ->where('gender',$gender)
        ->count());
    }

    function generateMonthlyGraph()
    {
        $year = 2023;
        $monthlyData = Booking::whereYear('booking_date', $year)
                              ->orderBy('booking_date')
                              ->get()
                              ->groupBy(function ($item) {
                                  return Carbon::parse($item->booking_date)->format('F');
                                  
                              })
                              ->map(function ($group) {
                                  return $group->count();
                              });
    
        return $monthlyData;
    }
}
