<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $credientals = $request->only('email','password');

        if(Auth::attempt($credientals)) {
            $user = Auth::user();
            $token = $user->createToken('Token_Name')->plainTextToken;
            return response()->json(['token'=>$token]);
        } else {


            return response()->json(['message'=>'Email veya şifre geçersiz'],401);
        }
    }
}
