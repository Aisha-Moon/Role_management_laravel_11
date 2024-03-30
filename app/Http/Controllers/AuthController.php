<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\ResetPassword;




class AuthController extends Controller
{
    public function registration(){

        $data['meta_title']='Registration Page';

        return view('auth.registration',$data);
    }
    public function login(){
        $data['meta_title']='Login Page';

        return view('auth.login',$data);
    }
    public function login_post(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ],true)){
            if(Auth::user()->is_role==2){
                // echo 'super';die();
                return redirect()->intended('superadmin/dashboard');
            }else if(Auth::user()->is_role==1){
                return redirect()->intented('admin/dashboard');

            }else if(Auth::user()->is_role==0){
                return redirect()->intended('user/dashboard');
            }else{
                return redirect('login')->with('error','No available Email');
            }

        }else{
            return redirect()->back()->with('error','Incorrect Credentials');
        }
    }
    public function forgot_pass(){
        $data['meta_title']='Forgot Password Page';

        return view('auth.forgot_pass',$data);
    }
    public function forgot_post(Request $request ){
        $email=User::where('email',$request->email)->count();

        if($email){
            $user=User::where('email',$request->email)->first();
            $user->remember_token=Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success','Password has been reset');

        }else{
            return redirect()->back()->with('error','Email Not Found');
        }
    }
    public function registration_post(Request $request){
        $user=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'confirm_password'=>'required_with:password|same:password|min:6',
            'is_role'=>'required'
        ]);
        $user=new User;
        $user->name=trim($request->name);
        $user->email=trim($request->email);
        $user->password=Hash::make($request->password);
        $user->is_role=trim($request->is_role);
        $user->remember_token=Str::random(50);
        $user->save();

        return redirect('login')->with('success','Register Successfully');

    }
    public function getReset(Request $request,$token){
        $user=User::where('remember_token',$token);

        if($user->count()==0){
            abort(404);
        }
        $user=$user->first();
        $data['token']=$token;
        $data['meta_title']='Reset Page';
        return view('auth.reset',$data);

    }
    public function ResetPost($token,ResetPassword $request){


        $user=User::where('remember_token',$token);

        if($user->count()==0){
            abort(404);
        }
        $user=$user->first();
        $user->password=Hash::make($request->password);
        $user->remember_token=Str::random(50);
        $user->save();

        return redirect('login')->with('success','Password has been updated');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
