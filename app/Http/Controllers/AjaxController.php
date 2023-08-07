<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AjaxController extends Controller
{
function calculateNic($nic){
    $selnic = $nic;
    if(strlen($selnic)==10)
    {
        $bdayyear=substr($selnic, 0,2);
        $bdayyear=$bdayyear+1900;
        $bdaynum=substr($selnic, 2,3);
    }
    else if(strlen($selnic)==12)
    {
        $bdayyear=substr($selnic, 0,4);
        $bdaynum=substr($selnic, 4,3);
    }
    
    $bdaynum1=0;
    if($bdaynum>500)
    {
        $bdaynum1=$bdaynum-500;
        
    }
    else
    {
        $bdaynum1=$bdaynum;
    }
    
    $bdaydate;
    
    $month=array(31,29,31,30,31,30,31,31,30,31,30,31);
    $day_cal=0;//add total days of months
    $bdaymonth=0;
    $bdayday=0;
    for($x=0;$x<count($month);$x++)
    {
        $day_cal=$day_cal+$month[$x];
        if($day_cal>=$bdaynum1)
        {
            $bdayday=$bdaynum1-(($day_cal)-($month[$x]));
            $bdaymonth=++$x;
            break;
        }
    }
    $bdaydate=$bdayyear."-".$bdaymonth."-".$bdayday;
    $bdaydate=date("Y-m-d", strtotime($bdaydate));
    return  $bdaydate;  
}  
}