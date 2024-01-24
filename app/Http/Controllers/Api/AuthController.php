<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Requests\Auth\StoreRegisterRequest;
use App\Http\Controllers\Api\Requests\Auth\StoreForgotRequest;
use App\Http\Controllers\Api\Requests\Auth\StoreLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $confirmation_code = Str::random(10);

        $create = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),            
            'phone' => $request->input('phone'),
            'location_id' => 1,
            'role_id' => 1,
            'status' => 0,
            'token' => $confirmation_code,
        ]);

        Mail::to($request->input('email'))->send(new AccountVerification($confirmation_code));
        // $success['token'] = $user->createToken('MyApp')->accessToken;
        // $success['name'] = $user->name;        

        return response()->json(
            [
                'success' => 200,
                'message' => 'Đăng ký thành công, vào mail để kích hoạt tài khoản',
            ],
            $this->successStatus
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

        return redirect(route('auth.index'))->with('success', $notification_status);
    }
}
