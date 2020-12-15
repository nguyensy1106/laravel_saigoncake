<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
/*use Illuminate\Routing\Route;*/
use App\User;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //
    public function register(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
            'phone' => 'unique:users'
        ],
        [
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'phone.unique' => 'Số điện thoại đã tồn tại trong hệ thống'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

    	User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 3
        ]);

    	\Session::flash('flash_message', 'Đăng Kí Thành Công.');
    	return redirect()->route('login');
    }

    public function checklogin(Request $request)
    {	
    	$url_back = $request->url_back;
    	$email = $request->email;
    	$password = $request->password;
    	if( Auth::attempt([
    		'email' => $email,
    		'password' => $password
    	])) {
            if(Auth::user()->role == 3) {
                if($url_back == route('login') || $url_back == route('resetpassword'))
                {
                    return redirect()->route('index');
                }else{
                      return redirect($url_back);
                }
            } else {

                 return redirect()->route('admin');
            }
    	}else{
    		\Session::flash('flash_message', 'Email hoặc Password không đúng.');
    		return redirect()->route('login');
    	}
    }

    public function logout()
    {
    	Auth::logout();
        return redirect()->back();
    }

    public function resetpassword()
    {
        /*$route = Route::current()->getName();
        dd($route);*/
        return view('resetpassword');
    }

    public function changepassword(Request $request)
    {
        $to_email = $request->email; 
        $to_name = "Bánh Kem Sài Gòn";
        $password = Str::random(8);
        $data = array("name" => $to_name, "body" => $password);
        $result = User::where('email',$to_email)->first();
        if($result) {
            Mail::send('sendMailChangePassword',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('Lấy lại mật của bạn');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
            });
            User::where('email',$to_email)->update(['password'=>Hash::make($password)]);
            \Session::flash('flash_message', 'Password đã được gửi sang email của bạn.');
            return redirect()->back();
        } else {
            \Session::flash('flash_message', 'Email này chưa đăng kí tài khoản.');
            return redirect()->back();
        }

    }

    public function show_exchangepassword()
    {
        return view('exchangepassword');
    }

    public function postpassword(Request $request)
    {
        $data = $request->password;
        $email = Auth::user()->email;
        if(Auth::attempt([
            'email'=> $email,
            'password'=> $data 
        ])) {
           return redirect()->route('formsetuppassword');/*view('setuppassword');*/
        }else{
            \Session::flash('flash_message_error', 'Mật Khẩu Không Đúng');
            return redirect()->back();
        }
    }

    public function formsetuppassword()
    {
        return view('setuppassword');
    }

    public function setuppassword(Request $request)
    {
        $newpassword = $request->newpassword;
        $confirmpassword = $request->confirmpassword;
        if($newpassword == $confirmpassword) {
           User::where('id', Auth::user()->id )->update(['password'=>Hash::make($newpassword)]); 
            \Session::flash('flash_message', 'Đổi Mật Khẩu Thành Công');
            return redirect()->route('myaccount');
        }else{
            \Session::flash('flash_message_error', 'Mật Khẩu Không Khớp');
            return redirect()->back();
        }
        
    }
}
