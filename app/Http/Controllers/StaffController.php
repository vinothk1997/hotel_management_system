<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Carbon\Carbon;

class StaffController extends Controller
{
    function index(){
        $staffs=Staff::orderby('id','desc')->get();
        return view('staffs.index',compact('staffs'));
    }
    function create(){
        return view('staffs.create');
        
    }
    function store(Request $req){
        $staff = new Staff;
        $staff->fname=$req->fname;
        $staff->lname=$req->lname;
        $staff->nic=$req->nic;
        $staff->dob=$req->dob;
        $staff->gender=$req->gender;
        $staff->phone_no=$req->mobile;
        $staff->address=$req->address;
        $staff->email = $req->email;
        $staff->position = $req->designation;
        $staff->save();
        return rediect()->route('staff.index');
        
    }
    
    function edit(Request $req){
        $staff=Staff::find($req->id);
        return view('staffs.edit',compact('staff'));
    }
    function update(Request $req){
        $staff=Staff::find($req->id);
        $staff->fname=$req->fname;
        $staff->lname=$req->lname;
        $staff->nic=$req->nic;
        $staff->dob=$req->dob;
        $staff->gender=$req->gender;
        $staff->phone_no=$req->mobile;
        $staff->address=$req->address;
        $staff->email = $req->email;
        $staff->position = $req->designation;
        $staff->save();
        return redirect()->route('staff.index');
    }

    function destroy($staff){
        $obj=User::where('user_id',$staff)->first();
        $obj->status='inactive';
        $obj->save();
        // Update End date when deleteing staff
        $staffWorkplace=DB::table('staff_workplaces')
        ->where('staff_id',$staff)
        ->where('end_date',null)
        ->update(['end_date'=>Carbon::now()]);
        return redirect()->back();
    }
   
}