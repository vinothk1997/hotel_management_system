<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class ReportController extends Controller
{
    function createGenderBasedReport(){
        return view('report.family-report1');
    }

    function generateFamilyBasedDOB(Request $req){
        if($req->end_date>=$req->start_date){
            $familyHeads = Cust::where('dob', '>', $req->start_date)
            ->where('dob', '<', $req->end_date)
            ->get();
            return $familyHeads;
        }
        else{
            return '';
        }
    }

    function createFamilyBasedGenderAndAge(){
        return view('report.family-report2');
    }

    function generateFamilyBasedGenderAndAge(Request $request){
        $familyMembers = [];
    
        if ($request->age != "" && $request->gender != "") {
            $familyHeads = FamilyHead::where('gender', $request->gender)->get();
            $date = Carbon::now()->subYear($request->age)->format('Y-m-d');
    
            foreach ($familyHeads as $familyHead) {
                $filteredFamilyMembers = $familyHead->FamilyMembers->where('dob', '>', $date);
                foreach($filteredFamilyMembers as $familyMember){
                    $memberData = $familyMember->toArray();
                    $memberData['learning_place_type'] = $familyMember->learning_place_type!=null?$familyMember->learning_place_type:'N/A';
                    $memberData['education'] = $familyMember->Education?$familyMember->Education->name:'';
                    $familyMembers[] = $memberData;
                }
            }
        }
    
        return $familyMembers;
    }

    function createTreeReport(){
        return view('report.tree-report');
    }

    function generateTreeReport(Request $req){
        $result = Tree::select('tree_name', DB::raw('SUM(no_of_tree) as total'));
        if($req->tree_name!='All'){
            $result= $result->where('tree_name', $req->tree_name);
        }
        $result=$result->groupBy('tree_name')
        ->get();
        return $result;
    }

    function createFamilyIncomeReport(){
        return view('report.family-income-report');
    }

    function generateFamilyIncomeReport(Request $req) {
        $familyMembers = [];
        $familyHeads = FamilyHead::all();
        foreach ($familyHeads as $familyHead) {
            $family_id = $familyHead->family_id;
            $last_name = $familyHead->last_name;
            $first_name = $familyHead->first_name;
            
            $income = FamilyMember::where('family_id', $family_id)
                ->selectRaw('SUM(monthly_income) as income')
                ->where('monthly_income','>',$req->income_from)
                ->where('monthly_income','<=',$req->income_to)
                ->groupBy('family_id')
                ->first();
                if(!empty($income)){
                    $familyMember = [
                        'family_id' => $family_id,
                        'last_name' => $last_name,
                        'first_name' => $first_name,
                        'income' => $income->income
                    ];
                    $familyMembers[] = $familyMember;
                }
        }
        return $familyMembers;
    }


    function createFamilyVehicleReport(){
        $vehicleTypes=VehicleType::all();
        return view('report.family-vehicle',compact('vehicleTypes'));
    }

    function generateFamilyVehicleReport(Request $req){
        // return $req->vehicle_type;
        $families=[];
        $vehicles=[];
        $family;

        $vehicles=Vehicle::whereHas('VehicleModel', function (Builder $query)  use ($req) {
            $query->whereHas('VehicleType',function (Builder $query) use ($req){
                if($req->vehicle_type !='all'){
                    $query-> where('vehicle_type_id',$req->vehicle_type);
                }
            });
        })->get();

        foreach($vehicles as $vehicle){
            if(!empty($vehicle->family_id)){
                
                $family=[
                    'id'=>$vehicle->FamilyHead->family_id,
                    'name'=>$vehicle->FamilyHead->last_name.' '.$vehicle->familyHead->first_name,
                    'reg_no'=>$vehicle->reg_no,
                    'reg_date'=>$vehicle->reg_date,
                    'vehicle_type'=>$vehicle->VehicleModel->VehicleType->vehicle_type,
    
                ];
                $families[]=$family;
            }
            elseif(!empty($vehicle->member_id)){
                $family=[
                    'id'=>$vehicle->FamilyMember->member_id,
                    'name'=>$vehicle->FamilyMember->last_name.' '.$vehicle->FamilyMember->first_name,
                    'reg_no'=>$vehicle->reg_no,
                    'reg_date'=>$vehicle->reg_date,
        
                    ];
                    $families[]=$family;
                }

            else{
                return [];
            }

        }
            return $families;
    }
}
