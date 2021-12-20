<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);
        $credentials = request(['email','password']);
            if(!Auth::attempt($credentials)){
                return back()->with('error','User not found!');
            }
            // //check password
            // $user = User::where('email',$request->email)->first();
            // if(!Hash::check($request->password, $user->password,[])){
            //     return response()->json([
            //         'status_code' => 422,
            //         'message' => 'Password is not match!',
            //     ]);
            // }
            // //Access Token
            // $tokenResult = $user->createToken('authToken')->plainTextToken;
            // return response()->json([
            //     'status_code' => 200,
            //     'access_token' => $tokenResult,
            //     'message' => 'You have successful logged in!',
            // ]);
    }
}
