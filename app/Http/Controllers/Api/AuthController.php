<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Requests\Auth\StoreRegisterRequest;
use App\Http\Controllers\Api\Requests\Auth\StoreForgotRequest;
use App\Http\Controllers\Api\Requests\Auth\StoreLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountVerification;
use App\Models\User;
use Carbon\Carbon;
use Str;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function store(StoreLoginRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($arr)){
            if(Auth::check()){           
                if(Auth::user()){
                    $user = Auth::user();
                    $token = $user->createToken('auth_token')->accessToken;
                    
                    return response()->json([
                        'access_token' => $token,
                        'token_type'   => 'Bearer',
                    ]);
                }
            }
        }
        else{
            return response()->json(['message' => 'Invalid login details'], 401);
        }
    }

    public function register(StoreRegisterRequest $request)
    {
        $create = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),            
            'phone' => $request->input('phone'),
            'location_id' => 22,
            'status' => 0,
        ]);
        $attach = $create->roles()->sync(1);
        $sendMAil = $this->makeCode($create);      

        return response()->json(
            [
                'message' => 'Đăng ký thành công, vào mail để kích hoạt tài khoản',
            ],
        );
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

        return response()->json(
            [
                'message' => $notification_status,
            ],
        );
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

    public function forgotStore(StoreForgotRequest $request)
    {
        $email = $request->input('email'); 

        $user = User::where('email', $email)->firstOrFail();
        if(!$user){
            return response()->json(
                [
                    'message' => 'Tài khoản của bạn chưa được đăng ký',
                ],
            );
        }

        $passwordReset = $user->update([
            'status' => 2,
            'token' => Str::random(60),
        ]);
        
        if ($passwordReset) {
            $sendMAil = $user->notify(new ResetPasswordRequest($user->token));
        }

        return response()->json(
            [
                'message' => 'Mời bạn vào mail để đổi lại mật khẩu',
            ],
        );
    }

    public function checkToken($token)
    {
        $passwordReset = User::where('token', $token)->firstOrFail();

        //phát triển thêm thời gian tồn tại token
        // if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
        //     $passwordReset->delete();

        //     return response()->json([
        //         'message' => 'This password reset token is invalid.',
        //     ], 422);
        // }

        if(!$passwordReset){
            return redirect()->route('auth.index')->with('fail', 'Sai mã token');
        }

        return response()->json(
            [
                'message' => 'Xác nhận thành công, mời bạn thay đổi mật khẩu',
            ],
        );
        // return redirect()->route('auth.enterPassword')->with('email', $passwordReset->email);
    }

    public function reset(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $updatePasswordUser = $user->update([
            $request->only('password'),
            'status' => 1,
            'token' => null,
        ]);

        return response()->json(
            [
                'message' => 'Bạn đã đổi mật khẩu thành công, mời bạn đăng nhập để lấy token',
            ],
        );
    }

    public function logout(){
        Auth::logout();
        return response()->json(
            [
                'message' => 'Đăng xuất thành công',
            ],
        );
    }
}
