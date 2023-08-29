<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Staff;
use App\Models\Customer;
use Session;

class UserController extends Controller
{
    function showLogin(){
        if(session()->has('user')){
            session()->pull('user');
        }
        return view('auth.login');
    }
    
    function login(Request $req){
        $user=User::where('user_id',$req->user_name)->first();
        if(!$user){
            return view('auth.login',['message'=>"user_error"]);
        }
        else{
            if($user->attempt<3){
                if(!Hash::check($req->password,$user->password)){
                    $lastAttempt=$user->attempt;
                    $user=User::find($user->user_id);
                    $user->attempt=++$lastAttempt;
                    $user->save();
                    return view('auth.login',['message'=>"password_error"]);
                }
                else{
                    $user=User::find($user->user_id);
                    $user->attempt='0';
                    $user->save();
                    if($user->status=='active'){
                        if($user->user_type=='admin'){
                            $real_name=Staff::where('phone_no',$user->user_id)->first();
                        }
                        else{
                            $real_name=Customer::where('phone_no',$user->user_id)->first();
                            
                        }
                        session()->put("user",[
                            'id'=>$user->id,
                            "user_id"=>$user->user_id,
                            'name' => $user->name,
                            "user_type"=>$user->user_type,
                            "real_name"=>$real_name
                            
                        ]);
                        // return session()->all();
                        if(session()->get('user')['user_type']=='admin'){
                            return view('dashboard');
                        }
                        else{
                            return redirect()->to('/bookings/cutomer-booking');
                        }
                    }
                    else{
                        return "Your account has been disabled,contact administrator";
                    }
                    
                }
            }
            else{
                session()->flash('name', $user->name);
                return view('auth.forget_password');
                
            }
            
        }
      
    }
    
    function customForgetPassword(){
        if(session()->has('name')){
             session::forget('name');
        }
        else{
            
        }
        return view('auth.forget_password');
    }
    
    function recover(Request $req){
        $user=User::where('user_id',$req->mobile)->first();
        if(!$user){
            return view('auth.forget_password',['wrong_user'=>true]);
        }
        else{
            //determin as to select family head or staff to find mobile 
            if($user->user_type=="customer"){
                $user_mobile=Customer::where('phone_no',$user->user_id)->pluck('phone_no')->first();
            }
            elseif($user->user_type=="admin"){
                $user_mobile=Staff::where('phone_no',$user->user_id)->pluck('phone_no')->first();
            }
            // determine request mobile and database mobile is matched.
            if($user_mobile==$req->mobile){
                $verificationCode=rand(1000,9999);
                $verifiedUser= User::where('name',$req->user_name)->first();
                $verifiedUser->verification_code=$verificationCode;
                $verifiedUser->save();
                // sms gateway
                $gateUser = "94769669804";
                $password = "3100";
                $text = urlencode("Your verification code: ".$verificationCode);
                $to = "94".$user_mobile;

                $baseurl ="http://www.textit.biz/sendmsg";
                $url = "$baseurl/?id=$gateUser&pw=$password&to=$to&text=$text";
                $ret = file($url);

                $res= explode(":",$ret[0]);

                if (trim($res[0])=="OK")
                {
                // echo "Message Sent - ID : ".$res[1];
                return view('auth.verification_code',['user_name'=>$user->name]);
                }
                else
                {
                // echo "Sent Failed - Error : ".$res[1].
                return redirect()->back()->with(['IsNotconnection'=>true]);
                }
                // return "matched mobile number ";
            }
            else{
                return view('auth.forget_password',['wrong_mobile'=>true]);
            }
        }
        
    }
    function verifyCode(Request $req){
        // return $req;
        $user=User::where('name',$req->user_name)->first();
        if($user->verification_code==$req->verification_code){
            return view('auth.forget_change_password',["user_name"=>$user->name]);
        }

        
    }
    function storeConfirmedpassword (Request $req){
        $newPassword=$req->new_password;
        $confirmNewPassword=$req->confirm_new_password;
        if($newPassword===$confirmNewPassword){
            $newHashedPassword=Hash::make($newPassword);
            $updateUser=User::where('name',$req->user_name)->first();
            $updateUser->password=$newHashedPassword;
            $updateUser->attempt='0';
            $updateUser->save();
            return redirect()->route('auth.index')->with(['updated'=>'Your new password has been updated']);
        }
    }

    function changePasswordView(){
        return view('auth.change_password');
    }

    function changePassword (Request $req){
        // return $req;
        $newPassword=$req->new_password;
        $confirmNewPassword=$req->confirm_new_password;
        $enteredCurrentPassword=$req->current_password; 
        $loggedCurrentPassword=User::where('id',$req->user_name)->first()->pluck('password')[0];
        if(Hash::check($enteredCurrentPassword,$loggedCurrentPassword)){
            if($newPassword===$confirmNewPassword){
                $user =User::where('id',$req->user_name)->first();
                $user->password=Hash::make($newPassword);
                $user->save();
                session()->flush();
                return view('auth.login',['changed'=>"changed password"]);
            }
            else{
                return view('auth.change_password',['mismatched_pw'=>"You entered password not mached with confirm password"]);
            }
        }
        else{
            return view('auth.change_password',['wrong_current_pw'=>"Wrong current password"]);
        }
        
        
    }

    public function logout(){
        session()->flush();
        return redirect()->to('/');
    }
    
}