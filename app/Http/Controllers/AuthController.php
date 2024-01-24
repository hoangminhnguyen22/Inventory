<?php

namespace App\Http\Controllers;

use App\Notifications\ResetPasswordRequest;
use App\Http\Requests\Auth\StoreRegisterRequest;
use App\Http\Requests\Auth\StoreForgotRequest;
use App\Http\Requests\Auth\StoreLoginRequest;
use Illuminate\Http\Request;
use App\Mail\AccountVerification;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use Str;
use Auth;
use Hash;

class AuthController extends Controller
{
    public $token;
    public function index()
    {
        return view('auth.login')->with('type', 'login');
    }

    public function store(StoreLoginRequest $request)
    {
        $arr = [
            'email' => $request ->email,
            'password' => $request ->password,
        ];

        if(Auth::attempt($arr)){
            if(Auth::check()){           
                if(Auth::user()){
                    return redirect()->route('admin.dashboard');
                }
            }
        }
        else{
            return redirect()->route('auth.index')->with('error','Đăng nhập thất bại');
        }
    }

    public function register()
    {
        return view('auth.login')->with('type', 'register');
    }

    public function storeRegister(StoreRegisterRequest $request)
    {        
        $create = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),            
            'phone' => $request->input('phone'),
            'location_id' => 1,
            'status' => 0,
        ]);     

        $sendMAil = $this->makeCode($create);

        if(!$create){
            return redirect()->route('auth.index')->with('fail', 'Bạn đã tạo thất bại!');
        }
        
        return redirect()->route('auth.index')->with('success', 'Bạn đã tạo thành công!, mời bạn vào email để kích hoạt tài khoản');       
    }

    public function makeCode(User $user)
    {
        $confirmation_code = Str::random(10);
        $user = User::where('email', $user->email)->firstOrFail();

        $passwordReset = $user->update([
            'token' => $confirmation_code,
        ]);

        return Mail::to($user->email)->send(new AccountVerification($confirmation_code));
    }

    public function verify()
    {
        $user = Auth::user();
        return view('auth.verifyCode')->with('user', $user);
    }

    public function reSend()
    {
        $user = Auth::user();
        $sendMAil = $this->makeCode($user);
        return redirect()->route('admin.dashboard');       

    }

    public function storeVerify($code)
    {
        $user = User::where('token', $code);

        if ($user->count() > 0) {
            $user->update([
                'status' => 1,
                'token' => null,
                'email_verified_at' => Carbon::now(),
            ]);
            $notification_status = 'Bạn đã xác nhận thành công, mời đăng nhập';
        } else {
            $notification_status ='Mã xác nhận không chính xác';
        }

        return redirect(route('auth.index'))->with('success', $notification_status);
    }

    public function forgot()
    {
        return view('auth.login')->with('type', 'forgot');
    }

    public function forgotStore(StoreForgotRequest $request)
    {
        $email = $request->input('email'); 

        $user = User::where('email', $email)->firstOrFail();
        if(!$user){
            return redirect()->route('auth.forgot')->with('fail', 'Tài khoản bạn chưa đăng ký');
        }

        $passwordReset = $user->update([
            'token' => Str::random(60),
        ]);
        
        if ($passwordReset) {
            $sendMAil = $user->notify(new ResetPasswordRequest($user->token));
        }

        return redirect()->route('auth.index')->with('success', 'Gửi mail tạo thành công!, vào mail để lấy lại mật khẩu');
    }

    public function checkToken($token)
    {
        $passwordReset = User::where('token', $token)->firstOrFail();
        // if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
        //     $passwordReset->delete();

        //     return response()->json([
        //         'message' => 'This password reset token is invalid.',
        //     ], 422);
        // }
        if(!$passwordReset){
            return redirect()->route('auth.index')->with('fail', 'Sai mã token');
        }

        return redirect()->route('auth.enterPassword')->with('email', $passwordReset->email);
    }

    public function enterPassword(Request $request)
    {
        if($request->session()->has('email')){
            $request->session()->reflash();
        }else{
            $email = Auth::user()->email;
            $request->session()->flash('email', $email);
        }
        return view('auth.enterPassword');
    }

    public function reset(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $updatePasswordUser = $user->update([
            $request->only('password'),
            'status' => 1,
            'token' => null,
        ]);

        return redirect()->route('auth.index')->with('success', 'Đổi mật khẩu thành công, mời bạn đăng nhập lại');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.index');
    }
}
